<?php  
  
    class Login_model extends CI_Model {  
      
        public function valid_login($username,$password) {  
      
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $query = $this->db->get('user');  
      
            if ($query->num_rows() == 1)  
            {  
                return true;  
            } else {  
                return false;  
            }  
      
        }  
        
    }  
    
?>  