<?php  
    class get_receipt_model extends CI_Model {

        public function get_receipt(){

            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;
        }

    }
?>  

