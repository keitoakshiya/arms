	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		$this->load->view('login');
	}

	public function login_validation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run()) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('login_model');
			if ($this->login_model->valid_login($username,$password)) {
				$session_data = array('username' => $username);
				$this->session->set_userdata($session_data);
				header('Location:/arms/main/dashboard');	
				echo "tamang password";
			}
			else{
				header('Location:/index/');
				echo "timang";
			}
		}
	}

	public function dashboard(){
		$data = array(
		    'title' => 'Dashboard',
		    'description' => ' This is the dashboard of Accounts recieivable system'
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
		$this->load->view('dashboard');
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}
	public function patients(){
		$data = array(
		    'title' => 'Patients',
		    'description' => ' '
		);
		$this->load->model('patients_model');
		$res = $this->patients_model->get_patients();
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res;
        	$this->load->view('patients',$data2);
		}
		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

	public function add_patient(){
		$data = array(
		    'title' => 'Patient Registration',
		    'description' => ' '
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
		$this->load->view('add_patient');
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

	public function add_bill(){
		$data = array(
		    'title' => 'Recent Registration',
		    'description' => ' This is where you can add bill to recently registered patient '
		);
		$this->load->view('template/header',$data);
		$this->load->model('add_bill_model');
		$res = $this->add_bill_model->get_recent_registered();

		if($res){	$data2['result'] = $res;
        			$this->load->view('add_bill',$data2);
		}
		else {"Fail";}

		$this->load->view('template/footer');
	}

	public function insert_patient(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('first-name','first-name','required');
		/*$this->form_validation->set_rules('middle-name','middle-name','required');*/
		$this->form_validation->set_rules('last-name','last-name','required');


		
		if ($this->form_validation->run()) {

			$firstname = $this->input->post('first-name');
			$middlename = $this->input->post('middle-name');
			$lastname = $this->input->post('last-name');
			$this->load->model('add_patient_model');

			$this->add_patient_model->insert_patient($firstname,$middlename,
				$lastname);
		}
	}

	public function logout(){
		
	    $this->session->unset_userdata($session_data);
	    $this->session->sess_destroy();
	    echo "<script>alert('HINDI NAGANA LOGOUT');</script>";
	    header('Location: /arms');
	}

	public function accounts_receivable(){
		$data = array(
		    'title' => 'Accounts Receivable',
		    'description' => ' Summary of Accounts Receivable '
		);
		$this->load->view('template/header',$data);
		$this->load->model('accounts_receivable_model');
		$res = $this->accounts_receivable_model->get_bill();
		$this->load->view('template/container_header',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('accounts_receivable',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}


	public function payment_summary(){
		$data = array(
		    'title' => 'Payment Summary',
		    'description' => ' Total Payment of Bills '
		);
		$this->load->view('template/header',$data);
		$this->load->model('payment_summary_model');
		$res = $this->payment_summary_model->get_bill();
		$this->load->view('template/container_header',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('payment_summary',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');


	}

	public function remaining_balance(){
		$data = array(
		    'title' => 'Balance',
		    'description' => ' Total Remaining of Balance '
		);
		$this->load->view('template/header',$data);
		$this->load->model('remaining_balance_model');
		$res = $this->remaining_balance_model->get_bill();
		$this->load->view('template/container_header',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('remaining_balance',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}


	public function add_payment(){
		$data = array(
		    'title' => 'Add Payment',
		    'description' => ' Add payment '
		);
		$this->load->view('template/header',$data);
		$this->load->model('add_payment_model');
		$res = $this->add_payment_model->get_bill();
		$this->load->view('template/container_header',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('add_payment',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

	public function view_bill_by_patient($id){
		$data = array(
		    'title' => 'Payment Application Page 2',
		    'description' => ' '
		);
		$this->load->view('template/header2',$data);
		$this->load->model('view_bill_by_patient_model');
		$res = $this->view_bill_by_patient_model->get_view_bill_by_patient($id);

		if($res){	$data2['result'] = $res;
        			$this->load->view('view_bill_by_patient',$data2);
		}
		else {"Fail";}
		$this->load->view('template/footer2');
	}

	public function insert_bill(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hospital_bill','hospital_bill','required');
		$this->form_validation->set_rules('professional_bill','professional_bill','required');
		$this->form_validation->set_rules('id','id','required');

		if ($this->form_validation->run()) {
			

			$hospital_bill = $this->input->post('hospital_bill');
			$professional_bill = $this->input->post('professional_bill');
			$id = $this->input->post('id');

			$this->load->model('add_bill_model');

			$this->add_bill_model->insert_bill($hospital_bill,$professional_bill,$id);
		}
	}

	public function insert_transaction(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hospital_bill_payment','hospital_bill_payment','required');
		$this->form_validation->set_rules('professional_bill_payment','professional_bill_payment','required');
		$this->form_validation->set_rules('id','id','required');

		if ($this->form_validation->run()) {
			

			$hospital_bill_payment = $this->input->post('hospital_bill_payment');
			$professional_bill_payment = $this->input->post('professional_bill_payment');
			$id = $this->input->post('id');

			$this->load->model('view_bill_by_patient_model');

			$this->view_bill_by_patient_model->insert_transaction($professional_bill_payment,$professional_bill_payment,$id);
		}
	}

}