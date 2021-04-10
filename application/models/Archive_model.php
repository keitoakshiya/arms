<?php  
    class archive_model extends CI_Model {

	     public function archive_patient($id){
	    		$this->db->set('deleted', '1');
                $this->db->set('date_deleted','NOW()',FALSE);
	    		$this->db->where('id', $id);
	    		$this->db->update('patient');

                $this->db->set('deleted', '2');
                $this->db->where('patient_id', $id);
                $this->db->update('bill');

                $this->db->set('deleted', '2');
                $this->db->where('patient_id', $id);
                $this->db->update('transaction');
	    		//print_r($this->db->last_query());
	    		header("Location: /arms/main/patients");
	    }

            public function archive_or($id){
                $this->db->set('deleted', '1');
                $this->db->where('id', $id);
                $this->db->update('receipt');
                //print_r($this->db->last_query());
                header("Location: /arms/main/official_receipt_list2");
            }

            public function delete_patient($id){

                $this->db->where('patient_id', $id);
                $this->db->delete('bill');

                $this->db->where('patient_id', $id);
                $this->db->delete('transaction');

                $this->db->where('id', $id);
                $this->db->delete('patient');
                //print_r($this->db->last_query());
                header("Location: /arms/main/Archive");
            }

            public function delete_transaction($id){
                $this->db->where('id', $id);
                $this->db->delete('transaction');
                //print_r($this->db->last_query());
                header("Location: /arms/main/payment_history");
            }

            public function restore_patient($id){
                $this->db->set('deleted', '0');
                $this->db->where('id', $id);
                $this->db->where('deleted', '1');
                $this->db->update('patient');

                $this->db->set('deleted', '0');
                $this->db->where('patient_id', $id);
                $this->db->where('deleted', '2');
                $this->db->update('bill');
                
                $this->db->set('deleted', '0');
                $this->db->where('patient_id', $id);
                $this->db->where('deleted', '2');
                $this->db->update('transaction');
                //print_r($this->db->last_query());
                header("Location: /arms/main/Archive");
            }

	     public function get_patients(){
            $this->db->select('`patient`.`id` as patient_id,
                `patient`.`first_name` as first_name,
                `patient`.`last_name` as last_name,
                `patient`.`middle_name` as middle_name,
                DATE_FORMAT(`patient`.`date_deleted`, "%b %d %Y - %h:%i %p") as date_deleted,
                `patient`.`deleted` as patient_deleted,
                `bill`.`id` as bill_id,
                `bill`.`date` as bill_date,
                `bill`.`patient_type` as patient_type,
                `bill`.`hospital_bill` as hospital_bill,
                `bill`.`professional_bill` as professional_bill,
                `bill`.`deleted` as bill_deleted,
                `guarantor`.`id` as guarantor_id,
                `guarantor`.`name` as guarantor_name,
                `guarantor`.`type` as guarantor_type,
                `guarantor`.`deleted` as guarantor_deleted,'
            );
            $this->db->join('bill', 'patient.id = patient_id');
            $this->db->join('guarantor', 'guarantor.id = guarantor_id', 'left');
            $this->db->where('`patient`.`deleted` !=', '0');
            $query = $this->db->get('patient');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }
    }
?>  

