<?php  
    class roles_model extends CI_Model {

        public function get_users(){

        	$this->db->where('username != "admin"');
            $query = $this->db->get('user');
            $res   = $query->result();
            return $res;
        }

        public function update_role($id,$view_dashboard,$add_patient,$view_patients,$edit_patients,$delete_patients,$view_accounts_receivable,$view_accounts_receivable2,$view_payment_summary,$view_payment_summary2,$view_remaining_balance,$view_remaining_balance2,$add_official_receipt,$view_official_receipt_list2,$delete_official_receipt_list2,$view_company_list_official_receipt_list,$add_patient_to_receipt,$add_view_bill_by_patient,$view_list_company,$add_company,$view_archive,$delete_archive,$restore_archive,$add_account,$edit_roles,$delete_or,$permanently_delete,$view_payment_history,$edit_company){
        	/*$this->db->set('view_data', $view_data);
        	$this->db->set('add_data', $add_data);
        	$this->db->set('edit_data', $edit_data);
       		$this->db->set('delete_data', $delete_data);*/
            $this->db->set('view_dashboard', $view_dashboard);
            $this->db->set('add_patient', $add_patient);
            $this->db->set('view_patients', $view_patients);
            $this->db->set('edit_patients', $edit_patients);
            $this->db->set('delete_patients', $delete_patients);
            $this->db->set('view_accounts_receivable', $view_accounts_receivable);
            $this->db->set('view_accounts_receivable2', $view_accounts_receivable2);
            $this->db->set('view_payment_summary', $view_payment_summary);
            $this->db->set('view_payment_summary2', $view_payment_summary2);
            $this->db->set('view_remaining_balance', $view_remaining_balance);
            $this->db->set('view_remaining_balance2', $view_remaining_balance2);
            $this->db->set('add_official_receipt', $add_official_receipt);
            $this->db->set('view_official_receipt_list2', $view_official_receipt_list2);
            $this->db->set('delete_official_receipt_list2', $delete_official_receipt_list2);
            $this->db->set('view_company_list_official_receipt_list', $view_company_list_official_receipt_list);
            $this->db->set('add_patient_to_receipt', $add_patient_to_receipt);
            $this->db->set('add_view_bill_by_patient', $add_view_bill_by_patient,$view_list_company);
            $this->db->set('view_list_company', $view_list_company);
            $this->db->set('add_company', $add_company);
            $this->db->set('view_archive', $view_archive);
            $this->db->set('delete_archive', $delete_archive);
            $this->db->set('restore_archive', $restore_archive);
            $this->db->set('add_account', $add_account);
            $this->db->set('edit_roles', $edit_roles);
            $this->db->set('delete_or', $delete_or);
            $this->db->set('permanently_delete', $permanently_delete);
            $this->db->set('view_payment_history', $view_payment_history);
            $this->db->set('edit_company', $edit_company);
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

        public function view_payment_history(){

            $username = $this->session->userdata('username');

            $this->db->select('view_payment_history'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->view_payment_history;
            }
            return $can; 
        }

        public function edit_company(){

            $username = $this->session->userdata('username');

            $this->db->select('edit_company'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();

            foreach ($res as $key => $row) { 
                $can = $row->edit_company;
            }
            return $can; 
        }

        public function get_all_access(){

            $username = $this->session->userdata('username');

            $this->db->select('*'); 
            $this->db->where('username',$username); 
            $query = $this->db->get('user'); 
            $res   = $query->result();
            //print_r($this->db->last_query());
            return $res; 
        }
    }
?>  

