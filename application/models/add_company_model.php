<?php  
    class add_company_model extends CI_Model {

        public function insert_company($name, $type){
            $this->db->set('name', $name);
            $this->db->set('type', $type);
            $this->db->insert('guarantor');
            header("Location: /arms/main/add_company");
        
        }
    }
?>