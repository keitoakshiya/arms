<?php  
    class accounts_receivable_model extends CI_Model {

        public function get_bill(){

            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id');
            $this->db->where('patient.deleted =', 0);
            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;
        }

        public function get_bill_filtered($start,$end){

            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id');
            $this->db->where('date_created >=', $start);
            $this->db->where('date_created <=', $end);
            $this->db->where('patient.deleted =', 0);
            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;
        }


    }
?>  