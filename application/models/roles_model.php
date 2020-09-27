<?php  
    class roles_model extends CI_Model {

        public function get_users(){

        	$this->db->where('username != "admin"');
            $query = $this->db->get('user');
            $res   = $query->result();
            return $res;
        }

        public function update_role($id,$view_data,$add_data,$edit_data,$delete_data){
        	$this->db->set('view_data', $view_data);
        	$this->db->set('add_data', $add_data);
        	$this->db->set('edit_data', $edit_data);
       		$this->db->set('delete_data', $delete_data);
	   		$this->db->where('id', $id);
	   		$this->db->update('user');
	    	header("Location: /arms/main/roles");
        }

        public function can_read(){

        	$username = $this->session->userdata('username');

		    $this->db->select('view_data');
		    $this->db->where('username',$username);
		    $query = $this->db->get('user');
		    $res   = $query->result();

		    	foreach ($res as $key => $row) {
					$read = $row->view_data;
				}
            return $read; 

        }
        public function can_add(){

        	$username = $this->session->userdata('username');

		    $this->db->select('add_data');
		    $this->db->where('username',$username);
		    $query = $this->db->get('user');
		    $res   = $query->result();

		    	foreach ($res as $key => $row) {
					$add = $row->add_data;
				}
            return $add; 

        }

        public function can_delete(){

        	$username = $this->session->userdata('username');

		    $this->db->select('delete_data');
		    $this->db->where('username',$username);
		    $query = $this->db->get('user');
		    $res   = $query->result();

		    	foreach ($res as $key => $row) {
					$delete = $row->delete_data;
				}
            return $delete; 

        }

        public function can_edit(){
            $username = $this->session->userdata('username');
            $this->db->select('edit_data');
            $this->db->where('username',$username);
            $query = $this->db->get('user');
            $res   = $query->result();
                foreach ($res as $key => $row) {
                    $edit = $row->edit_data;
                }
            return $edit; 
        }


    }
?>  

