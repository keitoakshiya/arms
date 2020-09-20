<?php  
    class official_receipt_list_model extends CI_Model {

        public function get_receipt(){


            $query = $this->db->get('receipt');

            $res   = $query->result();
            return $res;
        }



    }
?>  
