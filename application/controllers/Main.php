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

	public function insert_bill(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hostpital_bill','hostpital_bill','required');
		$this->form_validation->set_rules('professional_bill','professional_bill','required');
		$this->form_validation->set_rules('id','id','required');

		if ($this->form_validation->run()) {
			

			$hostpital_bill = $this->input->post('hostpital_bill');
			$professional_bill = $this->input->post('professional_bill');
			$id = $this->input->post('id');

			$this->load->model('add_bill_model');

			$this->add_bill_model->insert_bill($hostpital_bill,$professional_bill,$id);
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
		    'description' => ' '
		);
		$this->load->model('accounts_receivable_model');
		$res = $this->accounts_receivable_model->get_bill();
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('accounts_receivable',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}


}
