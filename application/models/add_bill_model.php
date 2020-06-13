<?php  
    class add_bill_model extends CI_Model {

        public function get_recent_registered(){
            $data = array();
            $this->db->where('hostpital_bill', '0.00');
            $this->db->where('professional_bill', '0.00');
            $this->db->order_by('date_created', 'DESC');
            $this->db->join('patient', 'patient.id = patient_id');
            $query = $this->db->get('bill');

            
            $res   = $query->result();
            return $res;
        }

        public function insert_bill($hostpital_bill,$professional_bill,$id){
            $this->db->set('hostpital_bill', $hostpital_bill);
            $this->db->set('professional_bill', $professional_bill);
            $this->db->where('patient_id', $id);
            $this->db->update('bill');
            header("Location: /index/main/add_bill");
        }

    }
?>  