<?php  
    class view_bill_by_patient_model extends CI_Model {

        public function get_view_bill_by_patient($id){
            $data = array();
            $this->db->where('`patient`.`id`', $id);
            $this->db->order_by('date_created', 'DESC');
            $this->db->join('patient', 'patient.id = patient_id');
            $query = $this->db->get('bill');

            
            $res   = $query->result();
            return $res;
        }

        public function insert_bill($hospital_bill,$professional_bill,$id){
            $this->db->set('hospital_bill', $hospital_bill);
            $this->db->set('professional_bill', $professional_bill);
            $this->db->where('patient_id', $id);
            $this->db->update('bill');
            header("Location: /arms/main/add_bill");
        }

    }
?>  