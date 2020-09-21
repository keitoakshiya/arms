<?php  
    class accounts_receivable_model extends CI_Model {

        public function get_bill(){

            $this->db->select('
                guarantor.id,guarantor.name,
    #bill
    IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE guarantor_id = guarantor.id),0) AS hospital_bill_total,
    IFNULL((SELECT SUM(professional_bill) FROM bill WHERE guarantor_id = guarantor.id),0) AS professional_bill_total,
    (IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE guarantor_id = guarantor.id),0) +
    IFNULL((SELECT SUM(professional_bill) FROM bill WHERE guarantor_id = guarantor.id),0)) AS total_bill,
    #payments
    IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE transaction.id = guarantor.id),0) AS total_hospital_paid,
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE transaction.id = guarantor.id),0) AS total_professional_paid,
    (IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE transaction.id = guarantor.id),0)+
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE transaction.id = guarantor.id),0)) AS total_paid,
    #balance
    (IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE guarantor_id = guarantor.id),0)-
    IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE transaction.id = guarantor.id),0)) AS hospital_bill_balance,
    (IFNULL((SELECT SUM(professional_bill) FROM bill WHERE guarantor_id = guarantor.id),0)-
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE transaction.id = guarantor.id),0)) AS professional_bill_balance,
        ((IFNULL((SELECT SUM(hospital_bill) FROM bill WHERE guarantor_id = guarantor.id),0)-
    IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE transaction.id = guarantor.id),0))+
    (IFNULL((SELECT SUM(professional_bill) FROM bill WHERE guarantor_id = guarantor.id),0)-
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE transaction.id = guarantor.id),0))) AS total_balance
    ');
            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id');
            $this->db->distinct();
            $this->db->where('patient.deleted =', 0);
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