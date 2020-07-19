<?php  
    class add_bill_model extends CI_Model {

        public function get_recent_registered(){
            $data = array();
            $this->db->select('
bill.id,
bill.date,
bill.patient_id,
bill.guarantor_id,
bill.patient_type,
bill.hospital_bill,
bill.professional_bill,
bill.deleted as bill_deleted,
patient.id as patient_id2,
patient.first_name,
patient.last_name,
patient.middle_name,
patient.date_created,
patient.deleted as patient_deleted,
');
            $this->db->where('hospital_bill', '0.00');
            $this->db->where('professional_bill', '0.00');
            $this->db->order_by('date_created', 'DESC');
            $this->db->join('patient', 'patient.id = patient_id');
            $query = $this->db->get('bill');
            //print_r($this->db->last_query());
            $res   = $query->result();
            return $res;
        }

        public function insert_bill($hospital_bill,$professional_bill,$id){
            $this->db->set('hospital_bill', $hospital_bill);
            $this->db->set('professional_bill', $professional_bill);
            $this->db->where('patient_id', $id);
            $this->db->update('bill');
            print_r($this->db->last_query());
            header("Location: /arms/main/add_bill");
        }

    }
?>  