<?php  
    class payment_history_model extends CI_Model {

        public function get_company(){

            $this->db->select('`patient`.`first_name`,`patient`.`middle_name`,`patient`.`last_name`,
            `transaction`.`hospital_bill_payment`,`transaction`.`professional_bill_payment`,`transaction`.`date_created`,
            `transaction`.`id`');

            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->order_by('transaction.date_created', 'DESC');
            $query = $this->db->get('transaction');

            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res;
        }



    }
?>  

