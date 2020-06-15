<?php  
    class add_payment_model extends CI_Model {

        public function get_bill(){

            $this->db->join('patient', 'patient.id = patient_id');
            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;
        }

    }
?>  

