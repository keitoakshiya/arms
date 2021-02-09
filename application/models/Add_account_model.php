<?php  
    class add_account_model extends CI_Model {

        public function insert_account($username, $password, $email){
        	if($this->checkDuplicateUser($username)){
	            $this->db->set('username', $username);
	            $this->db->set('password', $password);
	            $this->db->set('email', $email);
	            $this->db->insert('user');
	            header("Location: /arms/main/add_account");
        	}else{

        		header("Location: /arms/main/add_account");
        	}
        }
        public function checkDuplicateUser($username) {

		    $this->db->where('username', $username);

		    $query = $this->db->get('user');

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
