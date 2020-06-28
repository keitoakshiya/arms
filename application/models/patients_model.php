<?php  
    class patients_model extends CI_Model {

        public function get_patients(){
        	
            $query = $this->db->get('patient');
            $res   = $query->result();
            return $res;
        }

        public function get_patients_filtered($start,$end){


            $where = "date_created NETWEEN 'boss' AND 'active'";
        	
            $query = $this->db->get('patient');
            $res   = $query->result();

            return $res;
        }


    }
?>  