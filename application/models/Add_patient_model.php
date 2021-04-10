<?php  
    class add_patient_model extends CI_Model {  
        public function insert_patient($firstname,$middlename,$lastname,$date,
            $hospital_bill,$professional_bill,$company,$patient_type,$suffix,$registry_no) { 
            
            $date2 = date("Y-m-d", strtotime($date));
            $data = array(
                'first_name' => $firstname,
                'middle_name' => $middlename,
                'last_name' => $lastname,
                'suffix' => $suffix,
                'registry_no' => $registry_no,
                'date_created' => $date2
            );

            $this->db->insert('patient', $data);
            
            $insert_id = $this->db->insert_id();



            $data2 = array(
                'hospital_bill' => $hospital_bill,
                'professional_bill' => $professional_bill,
                
                'guarantor_id' => $company,
                'patient_type' => $patient_type,
                'patient_id' => $insert_id,
                'date' => $date2
            );

            $this->db->insert('bill', $data2);
            print_r("<script>alert('');</script>");
            //print_r($this->db->insert_id());
            //insert to bill query


            header("Location: /arms/main/add_patient");

        }      
    }  
?>  
