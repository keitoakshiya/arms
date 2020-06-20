<?php  
    class view_bill_by_patient_model extends CI_Model {

        public function get_view_bill_by_patient($id){
/*           $this->db->select('*,comment.id as comment_id,users.id as userid');
           $this->db->from('comment');
           $this->db->where('user_id', $user_id);
           $this->db->where('project_id', $projectId);
           $this->db->join('users', 'comment.user_id_from = users.id');
           $this->db->order_by("comment.id", "asc");
           return $this->db->get()->result_array();*/



            $data = array();
            $this->db->select('`patient`.id as patient_id, `patient`.first_name, `patient`.last_name, `patient`.middle_name, `patient`.date_created, `bill`.id as bill_id, `bill`.date, `bill`.patient_id, `bill`.guarantor_id, `bill`.patient_type, `bill`.hospital_bill, `bill`.professional_bill');

            $this->db->where('`patient_id`', $id);
            $this->db->order_by('date_created', 'DESC');
            $this->db->join('patient', 'patient.id = patient_id');

            $query = $this->db->get('bill');
            $res   = $query->result();
            return $res;
        }

        public function insert_transaction($hospital_bill_payment,$professional_bill_payment,$patient_id, $bill_id){
            $this->db->set('hospital_bill_payment', $hospital_bill_payment);
            $this->db->set('professional_bill_payment', $professional_bill_payment);
            $this->db->set('patient_id', $patient_id);
            $this->db->set('bill_id', $bill_id);
            $this->db->insert('transaction');
            header("Location: /arms/main/view_bill_by_patient/".$patient_id);
        }

    }
?>  