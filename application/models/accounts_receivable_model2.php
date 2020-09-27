<?php  
    class accounts_receivable_model2 extends CI_Model {

        public function get_bill($a){

            $this->db->select('
patient.first_name,patient.middle_name,patient.last_name,patient.date_created,
    bill.id AS bill_id,bill.date,bill.hospital_bill,bill.professional_bill,(bill.hospital_bill+bill.professional_bill) AS total_bill,
    
    IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0) AS total_hospital_bill_payment,
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0) AS total_professional_bill_payment,
    (IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0) +
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS total_payment,
    
    (bill.hospital_bill -IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS hospital_balance,
    (bill.professional_bill- IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS professional_balance,
    ((bill.hospital_bill+bill.professional_bill)-    (IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0) +
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0))) AS total_balance
    
    

        ');
            $this->db->join('patient', 'patient.id = patient_id');

            $this->db->distinct();
            $this->db->where('patient.deleted =', 0);
            $this->db->where('bill.guarantor_id =', $a);
            $query = $this->db->get('bill');
            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }

        public function get_bill_filtered($start,$end,$a){


             $this->db->select('
patient.first_name,patient.middle_name,patient.last_name,patient.date_created,
    bill.id AS bill_id,bill.date,bill.hospital_bill,bill.professional_bill,(bill.hospital_bill+bill.professional_bill) AS total_bill,
    
    IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0) AS total_hospital_bill_payment,
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0) AS total_professional_bill_payment,
    (IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0) +
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS total_payment,
    
    (bill.hospital_bill -IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS hospital_balance,
    (bill.professional_bill- IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0)) AS professional_balance,
    ((bill.hospital_bill+bill.professional_bill)-    (IFNULL((SELECT SUM(hospital_bill_payment) FROM transaction WHERE bill_id = bill.id),0) +
    IFNULL((SELECT SUM(professional_bill_payment) FROM transaction WHERE bill_id = bill.id),0))) AS total_balance
    
    

        ');
            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id');
            $this->db->where('date_created >=', $start);
            $this->db->where('date_created <=', $end);
                        $this->db->where('bill.guarantor_id =', $a);
            $this->db->where('patient.deleted =', 0);
            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;

        }


    }
?>  