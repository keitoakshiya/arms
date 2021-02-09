<?php  
    class get_by_id extends CI_Model {

        public function get_company_name_by_id($a){

            $this->db->select('name');
            $this->db->where('id',$a);
            $query = $this->db->get('guarantor');
            $res   = $query->result();

                foreach ($res as $key => $row) {
                    $name = $row->name;
                }
            return $name; 
        }

        public function get_patient_name_by_id($a){

            $this->db->select('first_name,last_name');
            $this->db->where('id',$a);
            $query = $this->db->get('patient');
            $res   = $query->result();

                foreach ($res as $key => $row) {
                    $name = $row->first_name.' ' .$row->last_name;
                }
            return $name; 
        }

        public function get_or_number_by_id($a){

            $this->db->select('or_number');
            $this->db->where('id',$a);
            $query = $this->db->get('receipt');
            $res   = $query->result();

                foreach ($res as $key => $row) {
                    $or_number = $row->or_number;
                }
            return $or_number; 
        }

    }
?>
