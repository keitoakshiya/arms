<?php  
    class add_patient_model extends CI_Model {  
        public function insert_patient($firstname,$middlename,$lastname,$suffix,
            $hospital_bill,$professional_bill,$company,$patient_type,$registry_no,$date) { 
            if($this->checkDuplicateUser($registry_no)){
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
            //print_r($this->db->last_query());
            //print_r("<script>alert('');</script>");
            //print_r($this->db->insert_id());
            //insert to bill query


            header("Location: /arms/main/add_patient");

            }else{

                header("Location: /arms/main/duplicate_error/$registry_no");
            }


        }    
        public function checkDuplicateUser($registry_no) {

            $this->db->where('registry_no', $registry_no);

            $query = $this->db->get('patient');

            $count_row = $query->num_rows();

            if ($count_row > 0) {
              //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
                return FALSE; // here I change TRUE to false.
                
             } else {
              // doesn't return any row means database doesn't have this email
                return TRUE; // And here false to TRUE
             }
        }  
    }  

?>  
