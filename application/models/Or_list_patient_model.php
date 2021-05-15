<?php  
class or_list_patient_model extends CI_Model {

    public function get_or_patient($a){

        $this->db->select('
            bill.id,
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

            `guarantor`.`name`,

            (SELECT DATE_FORMAT(or_date, "%b %d %Y - %h:%i %p")  FROM transaction where
                bill_id = bill.id ORDER BY or_date DESC LIMIT 1) AS pay_date,

            `receipt`.`id` AS `receipt_id`,
                `receipt`.`company`,
                `receipt`.`or_number`,
                `receipt`.`or_date`,
                `receipt`.`or_amount`,
                `receipt`.`or_number`,

                IFNULL((SELECT (SUM(hospital_bill_payment)+SUM(professional_bill_payment)) FROM transaction WHERE receipt_id = receipt.id),0) AS amount_applied,
            
            ');

            $this->db->join('bill', 'bill.id = bill_id');
            $this->db->join('patient', 'patient.id = transaction.patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id');
            $this->db->join('receipt', 'receipt.id = receipt_id');
            
            $this->db->where('`patient`.`deleted` =', '0');
            $this->db->where('`receipt`.`or_number` =', $a);
            $query = $this->db->get('transaction');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }



}
?>  

