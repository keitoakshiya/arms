<?php  
    class company_list_model extends CI_Model {

        public function get_company(){


            $query = $this->db->get('guarantor');

            $res   = $query->result();
            return $res;
        }



    }
?>  

