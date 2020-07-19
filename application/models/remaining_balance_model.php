<?php  
    class remaining_balance_model extends CI_Model {

        public function get_bill(){

            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->join('transaction', 'bill.id = bill_id', 'left');
            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;
        }


        public function get_bill_filtered($start,$end){

            $this->db->join('patient', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->join('transaction', 'bill.id = bill_id', 'left');
                        $this->db->where('patient.date_created >=', $start);
            $this->db->where('patient.date_created <=', $end);
            $query = $this->db->get('bill');



            //print_r($this->db->last_query());
            $res   = $query->result();
            return $res;
        }




    }
?>  