<?php  
    class delete_bill_model extends CI_Model {


        public function delete_bill($a){

            $this->db->where('patient_id', $a);
            $this->db->delete('bill');

            $this->db->where('id', $a);
            $this->db->delete('patient');

            header("Location: add_bill");

        }
    }
?>