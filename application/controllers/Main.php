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
				header('Location:/index/main/dashboard');	
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
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
		$this->load->view('patients');
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
	public function insert_patient(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('first-name','first-name','required');
		$this->form_validation->set_rules('middle-name','middle-name','required');
		$this->form_validation->set_rules('last-name','last-name','required');

		
		if ($this->form_validation->run()) {


			$firstname = $this->input->post('first-name');
			$middlename = $this->input->post('middle-name');
			$lastname = $this->input->post('last-name');
			$this->load->model('add_patient_model');

			$this->add_patient_model->insert_patient($firstname,$middlename,$lastname);
		}
	}

}
