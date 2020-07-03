<?php  
    class add_account_model extends CI_Model {

        public function insert_account($username, $password, $email){
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            $this->db->set('email', $email);
            $this->db->insert('user');
            header("Location: /arms/main/add_account");
        
        }
    }
?>