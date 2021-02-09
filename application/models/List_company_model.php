<?php  
    class list_company_model extends CI_Model {

        public function get_company(){


            $query = $this->db->get('guarantor');
            //$this->db->join('guarantor', 'guarantor.id = guarantor_id');
            $res   = $query->result();
            return $res;
        }



    }
?>  

