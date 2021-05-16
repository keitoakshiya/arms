<?php  
    class list_company_model extends CI_Model {

        public function get_company(){

            $this->db->select('`guarantor`.`id` as guarantor_id,
            	`guarantor`.`type`,
            	`guarantor`.`name`,
                `guarantor`.`address`,
                `guarantor`.`contact_person`,
                `guarantor`.`contact_number`,'
            );

            $query = $this->db->get('guarantor');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }

        public function edit_company($a){

            $this->db->select('`guarantor`.`id` as guarantor_id,
                `guarantor`.`type`,
                `guarantor`.`name`,
                `guarantor`.`address`,
                `guarantor`.`contact_person`,
                `guarantor`.`contact_number`,'
            );
            $this->db->where('id',$a);
            $query = $this->db->get('guarantor');
            $res   = $query->result();
            //print_r($this->db->last_query());  
            return $res;
        }

        public function update_company($id,$type,$name,$address,$contact_person,$contact_number){
        	$this->db->set('type', $type);
            $this->db->set('name', $name);
            $this->db->set('address', $address);
            $this->db->set('contact_person', $contact_person);
            $this->db->set('contact_number', $contact_number);
            
            $this->db->where('id', $id);
            $this->db->update('guarantor');
            //print_r($this->db->last_query()); 

            header("Location: list_company");
        }

    }
?>  

