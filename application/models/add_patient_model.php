<?php  
    class add_patient_model extends CI_Model {  
        public function insert_patient($firstname,$middlename,$lastname) {  
            $data = array(
                'first_name' => $firstname,
                'middle_name' => $middlename,
                'last_name' => $lastname
            );
            $this->db->insert('patient', $data);
            echo "<script>alert('Patient Added')</script>";
            header("Location: /index/main/add_patient");
        }      
    }  
?>  