<?php  
    class patients_model extends CI_Model {

        public function get_patients(){

            $query = $this->db->get('patient');
            $res   = $query->result();
            return $res;
        }

        public function get_patients_filtered($start,$end){
            $this->db->where('date_created >=', $start);
			$this->db->where('date_created <=', $end);
            $query = $this->db->get('patient');

            $res   = $query->result();
            //print_r($this->db->last_query());    

            return $res;
        }

    }
?>  