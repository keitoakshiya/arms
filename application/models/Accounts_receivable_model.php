<?php  
    class accounts_receivable_model extends CI_Model {

        public function get_bill(){

            $this->db->select('
                guarantor.id AS guarantor_id,guarantor.name,guarantor.type,

    IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE deleted = 0 AND guarantor_id = guarantor.id AND bill.deleted = 0 AND patient.deleted = 0),0) AS hospital_bill_total,
    IFNULL((SELECT SUM(professional_bill) FROM bill WHERE deleted = 0 AND guarantor_id = guarantor.id AND bill.deleted = 0 AND patient.deleted = 0),0) AS professional_bill_total,
    (IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE deleted = 0 AND guarantor_id = guarantor.id AND bill.deleted = 0 AND patient.deleted = 0),0) +
    IFNULL((SELECT SUM(professional_bill) FROM bill WHERE deleted = 0 AND guarantor_id = guarantor.id AND bill.deleted = 0 AND patient.deleted = 0),0)) AS total_bill,

    IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE deleted = 0 AND guarantor_id = (SELECT guarantor_id FROM bill WHERE deleted = 0 AND bill.id =transaction.bill_id)),0) AS total_hospital_paid,

    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE deleted = 0 AND guarantor_id = (SELECT guarantor_id FROM bill WHERE deleted = 0 AND bill.id =transaction.bill_id)),0) AS total_professional_paid,


(IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE deleted = 0 AND deleted = 0 AND guarantor_id = 
    (SELECT guarantor_id FROM bill WHERE deleted = 0 AND bill.id =transaction.bill_id )), 0)+
 IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE deleted = 0 AND guarantor_id =
  (SELECT guarantor_id FROM bill WHERE deleted = 0 AND bill.id =transaction.bill_id ) ), 0)) AS total_paid,


IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE deleted = 0 AND guarantor_id = guarantor.id),0)-
IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE deleted = 0 AND guarantor_id = (SELECT guarantor_id FROM bill WHERE bill.id =transaction.bill_id)),0)
AS hospital_bill_balance,

IFNULL((SELECT SUM(professional_bill) FROM bill WHERE deleted = 0 AND guarantor_id = guarantor.id),0)-
IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE deleted = 0 AND guarantor_id = (SELECT guarantor_id FROM bill WHERE deleted = 0 AND bill.id =transaction.bill_id)),0)
AS professional_bill_balance, 


((IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE deleted = 0 AND guarantor_id = guarantor.id),0)-
IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE deleted = 0 AND guarantor_id = (SELECT guarantor_id FROM bill WHERE deleted = 0 AND bill.id =transaction.bill_id)),0))+

IFNULL((SELECT SUM(professional_bill) FROM bill WHERE deleted = 0 AND guarantor_id = guarantor.id),0)-
IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE deleted = 0 AND guarantor_id = (SELECT guarantor_id FROM bill WHERE deleted = 0 AND  bill.id =transaction.bill_id)),0))

AS total_balance

    ');
            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id');
            $this->db->distinct();
            $this->db->where('patient.deleted =', 0);
            $this->db->where('bill.deleted =', 0);
            $this->db->where('guarantor_id !=', 'null');
            $query = $this->db->get('bill');
            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }
        
        public function get_bill_filtered($start,$end){

            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id');
            $this->db->where('date_created >=', $start);
            $this->db->where('date_created <=', $end);
            $this->db->where('patient.deleted =', 0);

            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;
        }



    }
?>  
