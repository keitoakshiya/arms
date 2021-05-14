<?php  
    class or_list_model extends CI_Model {

        public function get_or(){

            $this->db->select('
                `receipt`.`id` AS `receipt_id`,
                `receipt`.`company`,
                `receipt`.`or_number`,
                `receipt`.`or_date`,
                `receipt`.`or_amount`,
                `receipt`.`or_number`,
                `guarantor`.`name`,

                IFNULL((SELECT (SUM(hospital_bill_payment)+SUM(professional_bill_payment)) FROM transaction WHERE receipt_id = receipt.id),0) AS amount_applied
            
            ');

            $this->db->join('guarantor', 'receipt.company = guarantor.id','left');
            
            $this->db->order_by('receipt.or_date', 'DESC');
            $query = $this->db->get('receipt');

            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }



    }
?>  

