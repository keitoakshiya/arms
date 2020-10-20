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

		    $this->db->select('view_data'); //SELECT view_data 1
		    $this->db->where('username',$username); //WHERE username = $username 3
		    $query = $this->db->get('user'); //FROM user 2
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

        public function view_dashboard(){

            $username = $this->session->userdata('username');

            $this->db->select('view_dashboard'); //SELECT view_data 1
            $this->db->where('username',$username); //WHERE username = $username 3
            $query = $this->db->get('user'); //FROM user 2
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_dashboard;
            }
            return $can; 
        }

        public function add_patient(){

            $username = $this->session->userdata('username');

            $this->db->select('add_patient'); //SELECT view_data 1
            $this->db->where('username',$username); //WHERE username = $username 3
            $query = $this->db->get('user'); //FROM user 2
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->add_patient;
            }
            return $can; 
        }

        public function view_patients(){

            $username = $this->session->userdata('username');

            $this->db->select('view_patients'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_patients;
            }
            return $can; 
        }

        public function edit_patients(){

            $username = $this->session->userdata('username');

            $this->db->select('edit_patients'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->edit_patients;
            }
            return $can; 
        }

        public function delete_patients(){

            $username = $this->session->userdata('username');

            $this->db->select('delete_patients'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->delete_patients;
            }
            return $can; 
        }

        public function view_accounts_receivable(){

            $username = $this->session->userdata('username');

            $this->db->select('view_accounts_receivable'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_accounts_receivable;
            }
            return $can; 
        }

        public function view_accounts_receivable2(){

            $username = $this->session->userdata('username');

            $this->db->select('view_accounts_receivable2'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_accounts_receivable2;
            }
            return $can; 
        }

        public function view_payment_summary(){

            $username = $this->session->userdata('username');

            $this->db->select('view_payment_summary'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_payment_summary;
            }
            return $can; 
        }

        public function view_payment_summary2(){

            $username = $this->session->userdata('username');

            $this->db->select('view_payment_summary2'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_payment_summary2;
            }
            return $can; 
        }

        public function view_remaining_balance(){

            $username = $this->session->userdata('username');

            $this->db->select('view_remaining_balance'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_remaining_balance;
            }
            return $can; 
        }

        public function view_remaining_balance2(){

            $username = $this->session->userdata('username');

            $this->db->select('view_remaining_balance2'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_remaining_balance2;
            }
            return $can; 
        }

        public function add_official_receipt(){

            $username = $this->session->userdata('username');

            $this->db->select('add_official_receipt'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->add_official_receipt;
            }
            return $can; 
        }

        public function view_official_receipt_list2(){

            $username = $this->session->userdata('username');

            $this->db->select('view_official_receipt_list2'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_official_receipt_list2;
            }
            return $can; 
        }

        public function delete_official_receipt_list2(){

            $username = $this->session->userdata('username');

            $this->db->select('delete_official_receipt_list2'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->delete_official_receipt_list2;
            }
            return $can; 
        }

        public function view_company_list_official_receipt_list(){

            $username = $this->session->userdata('username');

            $this->db->select('view_company_list_official_receipt_list'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_company_list_official_receipt_list;
            }
            return $can; 
        }

        public function add_patient_to_receipt(){

            $username = $this->session->userdata('username');

            $this->db->select('add_patient_to_receipt'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->add_patient_to_receipt;
            }
            return $can; 
        }

        public function add_view_bill_by_patient(){

            $username = $this->session->userdata('username');

            $this->db->select('add_view_bill_by_patient'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->add_view_bill_by_patient;
            }
            return $can; 
        }

        public function view_list_company(){

            $username = $this->session->userdata('username');

            $this->db->select('view_list_company'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_list_company;
            }
            return $can; 
        }

        public function add_company(){

            $username = $this->session->userdata('username');

            $this->db->select('add_company'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->add_company;
            }
            return $can; 
        }

        public function view_archive(){

            $username = $this->session->userdata('username');

            $this->db->select('view_archive'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_archive;
            }
            return $can; 
        }

        public function restore_archive(){

            $username = $this->session->userdata('username');

            $this->db->select('restore_archive'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->restore_archive;
            }
            return $can; 
        }

        public function add_account(){

            $username = $this->session->userdata('username');

            $this->db->select('add_account'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->add_account;
            }
            return $can; 
        }

        public function edit_roles(){

            $username = $this->session->userdata('username');

            $this->db->select('edit_roles'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->edit_roles;
            }
            return $can; 
        }

        public function delete_or(){

            $username = $this->session->userdata('username');

            $this->db->select('delete_or'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->delete_or;
            }
            return $can; 
        }

        public function permanently_delete(){

            $username = $this->session->userdata('username');

            $this->db->select('permanently_delete'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->permanently_delete;
            }
            return $can; 
        }

    }
?>  

