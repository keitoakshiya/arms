<?php  
    class add_patient_model extends CI_Model {  
        public function insert_patient($firstname,$middlename,$lastname) { 
 
            $data = array(
                'first_name' => $firstname,
                'middle_name' => $middlename,
                'last_name' => $lastname
            );

            $this->db->insert('patient', $data);
               $insert_id = $this->db->insert_id();

            $data2 = array(
                'patient_id' => $insert_id
            );

            $this->db->insert('bill', $data2);
            echo "<script>alert('asdasd');</script>";
            header("Location: /arns/main/add_patient");

        }      
    }  
?>  