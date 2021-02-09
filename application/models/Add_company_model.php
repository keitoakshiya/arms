<?php  
    class add_company_model extends CI_Model {

        public function insert_company($name, $type,$address,$contact_person,$contact_number){
        	if ($this->checkDuplicateCompany($name)) {
        		$this->db->set('name', $name);
	            $this->db->set('type', $type);
	            $this->db->set('address', $address);
	            $this->db->set('contact_person', $contact_person);
	            $this->db->set('contact_number', $contact_number);
	            $this->db->insert('guarantor');
	            header("Location: /arms/main/add_company");
        	}else{
        		header("Location: /arms/main/list_company");
        	}

        
        }
        public function checkDuplicateCompany($company) {

		    $this->db->where('name', $company);

		    $query = $this->db->get('guarantor');

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
