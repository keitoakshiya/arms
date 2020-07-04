<?php  
    class archive_model extends CI_Model {
	     public function archive_patient($id){
	    		$this->db->set('deleted', '1');
	    		$this->db->where('id', $id);
	    		$this->db->update('patient');
	    		print_r($this->db->last_query());
	    		header("Location: /arms/main/patients");
	    	}

	    		             public function get_patients(){
            $this->db->select('`patient`.`id` as patient_id,
                `patient`.`first_name` as first_name,
                `patient`.`last_name` as last_name,
                `patient`.`middle_name` as middle_name,
                `patient`.`date_created` as date_created,
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
            $this->db->where('`patient`.`deleted` =', '1');
            $query = $this->db->get('patient');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }
    }
?>  

