<?php  
    class patients_model extends CI_Model {

        public function get_patients(){
            $data = array();

            $query = $this->db->get('patient');

            
            $res   = $query->result();
            return $res;
        }

    }
?>  