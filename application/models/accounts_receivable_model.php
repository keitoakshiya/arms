<?php  
    class accounts_receivable_model extends CI_Model {

        public function get_bill(){

            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;
        }

    }
?>  