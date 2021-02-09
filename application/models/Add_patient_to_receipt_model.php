<?php  
    class add_patient_to_receipt_model extends CI_Model {

        public function get_patients($a){
            $this->db->select(' bill.id,
    bill.deleted,
    DATE_FORMAT(`bill`.`date`, "%b %d %Y") as date,
    bill.patient_id,
    patient.first_name,
    patient.middle_name,
    patient.last_name,
    bill.guarantor_id,
    bill.patient_type,
    bill.hospital_bill,
    bill.professional_bill,
    (bill.professional_bill+bill.hospital_bill) AS total_bill,

    IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0) AS hospital_bill_payment,
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0) AS professional_bill_payment,
    (IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0)+
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS total_payment,
    
    (bill.hospital_bill-IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS hospital_bill_balance,
    (bill.professional_bill-IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS professional_bill_balance,
        (
            (bill.hospital_bill+bill.professional_bill)-
            (IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0)+
            IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0)
        )
    ) as total_balance
    '
            );
            $this->db->join('bill', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->where('`patient`.`deleted` =', '0');
            $this->db->where('`guarantor`.`id` =', $a);
            $query = $this->db->get('patient');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }



    }
?>  
