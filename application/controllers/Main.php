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
				echo "Correct Password";
			}
			else{
				header('Location:/arms/');
				echo "Incorrect Password";
			}
		}
	}

		public function dashboard(){
		$this->load->model('roles_model');
		if ($this->roles_model->view_dashboard()==0) {
$this->logout();
		}

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Dashboard';
		$data['description'] = ' ';

		

		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);

		$this->load->model('dashboard_model');
		$res = $this->dashboard_model->top_10_bar();
		$data2['result'] = $res;
		$res2 = $this->dashboard_model->guarantor_distribution();
		$data2['result2'] = $res2;
		$res3 = $this->dashboard_model->patient_type_distribution();
		$data2['result3'] = $res3;
		$res4 = $this->dashboard_model->patient_count_per_guarantor();
		$data2['result4'] = $res4;
		$res5 = $this->dashboard_model->guarantor_balance();
		$data2['result5'] = $res5;
		$this->load->view('dashboard',$data2);
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function patients() {
		$this->load->model('roles_model');

		if ($this->roles_model->view_patients()==0) {
$this->logout();
		}

		$this->load->model('patients_model');
		$res = $this->patients_model->get_patients();

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Patients List';
		$data['description'] = ' ';
		
		$this->load->model('patients_model');
		$res = $this->patients_model->get_patients();
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header_daterange',$data);

		if($res){	$data2['result'] = $res;
        	$this->load->view('patients',$data2);
		}
		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function edit_patient($a){
		$this->load->model('roles_model');
		if ($this->roles_model->edit_patients()==0) {
$this->logout();
		}
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Edit Patient';
		$data['description'] = '';

		$this->load->model('patients_model');
		$res = $this->patients_model->get_patient($a);
		$data2['result'] = $res;
		$this->load->view('template/header2',$data);
		$this->load->view('template/container_header',$data);
        $this->load->view('edit_patient',$data2);
        $this->load->view('template/container_footer');
		$this->load->view('template/footer2');

	}

		public function update_patient(){

		$this->load->model('roles_model');
		if ($this->roles_model->can_edit()==0) {
$this->logout();
		}
		$this->load->model('patients_model');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname','fname','required');
		$this->form_validation->set_rules('mname','mname','required');
		$this->form_validation->set_rules('lname','lname','required');
		$this->form_validation->set_rules('suffix','suffix','required');
		$this->form_validation->set_rules('hospital_bill','hospital_bill','required');
		$this->form_validation->set_rules('professional_bill','professional_bill','required');
		$this->form_validation->set_rules('guarantor_id','guarantor_id','required');

		if ($this->form_validation->run()) {
			$id = $this->input->post('id');
			$fname = $this->input->post('fname');
			$mname = $this->input->post('mname');
			$lname = $this->input->post('lname');
			$suffix = $this->input->post('suffix');
			$hospital_bill = $this->input->post('hospital_bill');
			$professional_bill = $this->input->post('professional_bill');
			$professional_bill = $this->input->post('guarantor_id');
			$this->load->model('patients_model');

		$res = $this->patients_model->update_patient($id,$fname,$mname,$lname,$suffix,$hospital_bill,$professional_bill,$guarantor_id);
		}
	}

		public function patients_filtered() {
					$this->load->model('roles_model');
					if ($this->roles_model->view_dashboard()==0) {
						$this->logout();
					}

					$all_access = $this->roles_model->get_all_access();
					$data['all_access'] = $all_access;
					$data['title'] = 'Patients List';
					$data['description'] = ' ';

						$start = $this->input->post('start');
						$end = $this->input->post('end');
						$data['start'] = $start;
						$data['end'] = $end;
						$this->load->model('patients_model');

					$res = $this->patients_model->get_patients_filtered($start,$end);


					$this->load->view('template/header',$data);
					$this->load->view('template/container_header_daterange',$data);

			        if($res){	$data2['result'] = $res;
			        	$this->load->view('patients',$data2);
					}
					else {
						$this->load->view('patients');
					}

					$this->load->view('template/container_footer');
					$this->load->view('template/footer');

		}

		public function add_patient(){

		$this->load->model('roles_model');
		if ($this->roles_model->add_patient()==0) {
$this->logout();
		}

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Add Patient';
		$data['description'] = ' ';

		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
		$this->load->view('add_patient');
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function add_bill(){
				$this->load->model('roles_model');
		if ($this->roles_model->can_add()==0) {
			header("Location: denied");
		}
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

		public function add_patient_to_receipt($a,$b) {
		$this->load->model('roles_model');

		if ($this->roles_model->add_patient_to_receipt()==0) {
$this->logout();
		}


		$this->load->model('get_by_id');
		$name =$this->get_by_id->get_company_name_by_id($a);
		$or_number =$this->get_by_id->get_or_number_by_id($b);

		
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = $name .' / '. $or_number;
		$data['description'] = ' ';
		$data['a'] = $a;

		$this->load->model('add_patient_to_receipt_model');
		$res = $this->add_patient_to_receipt_model->get_patients($a);
		$this->load->view('template/header3',$data);
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res; $data2['receipt'] = $b;
			$data2['a'] = $a;
        	$this->load->view('add_patient_to_receipt',$data2);
		}
		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer3');
	}

		public function insert_patient(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('first-name','first-name','required');
		/*$this->form_validation->set_rules('middle-name','middle-name','required');*/
		$this->form_validation->set_rules('last-name','last-name','required');


		$this->form_validation->set_rules('hospital_bill','hospital_bill','required');
		$this->form_validation->set_rules('professional_bill','professional_bill','required');
		$this->form_validation->set_rules('company','company','required');
		$this->form_validation->set_rules('patient_type','patient_type','required');
		$this->form_validation->set_rules('suffix','suffix','required');
		$this->form_validation->set_rules('registry_no','registry_no','required');


		
		if ($this->form_validation->run()) {

			$firstname = $this->input->post('first-name');
			$middlename = $this->input->post('middle-name');
			$lastname = $this->input->post('last-name');
			

			$date = $this->input->post('date');
			$hospital_bill = $this->input->post('hospital_bill');
			$professional_bill = $this->input->post('professional_bill');
			$company = $this->input->post('company');
			$patient_type = $this->input->post('patient_type');
			$suffix = $this->input->post('suffix');
			$registry_no = $this->input->post('registry_no');


			$this->load->model('add_patient_model');

			$this->add_patient_model->insert_patient($firstname,$middlename,
				$lastname,$date,$hospital_bill,$professional_bill,$company,$patient_type,$suffix,$registry_no);
		}
	}

		public function logout(){
		
	    $this->session->unset_userdata($session_data);
	    $this->session->sess_destroy();
	    echo "<script>alert('');</script>";
	    header('Location: /arms');
	}

		public function accounts_receivable(){
		$this->load->model('roles_model');
		if ($this->roles_model->view_accounts_receivable()==0) {
$this->logout();
		}

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Accounts Receivable';
		$data['description'] = 'Company List';

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

		public function accounts_receivable2($a){
		$this->load->model('roles_model');
		if ($this->roles_model->view_accounts_receivable2()==0) {
$this->logout();
		}

		$this->load->model('get_by_id');
		$name =$this->get_by_id->get_company_name_by_id($a);

		$all_access = $this->roles_model->get_all_access();
		$data['a'] = $a;
		$data['all_access'] = $all_access;
		$data['title'] = $name;
		$data['description'] = 'Accounts Receivable Patient List';


		$this->load->view('template/header2',$data);
		$this->load->model('accounts_receivable_model2');
		$res = $this->accounts_receivable_model2->get_bill($a);
		$this->load->view('template/container_header_daterange_accounts_receivable',$data); //add _daterange_accounts_receivable
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('accounts_receivable2',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer2');
	}


		public function accounts_receivable_filtered($a){

		$this->load->model('roles_model');
		if ($this->roles_model->view_accounts_receivable2()==0) {
$this->logout();
		}

		$this->load->model('get_by_id');
		$name =$this->get_by_id->get_company_name_by_id($a);

		$all_access = $this->roles_model->get_all_access();
		$data['a'] = $a;
		$data['all_access'] = $all_access;
		$data['title'] = $name;
		$data['description'] = 'Accounts Receivable Patient List';
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$data['start'] = $start;
		$data['end'] = $end;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('start','start','required');
		$this->form_validation->set_rules('end','end','required');

		if ($this->form_validation->run()) {

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$this->load->model('accounts_receivable_model2');

		$res = $this->accounts_receivable_model2->get_bill_filtered($start,$end,$a);


		$this->load->view('template/header2',$data);
		$this->load->view('template/container_header_daterange_accounts_receivable',
			$data);

			$data2['result'] = $res;
        	$this->load->view('accounts_receivable2',$data2);


		$this->load->view('template/container_footer');
		$this->load->view('template/footer2');
		}
	}


		public function payment_summary(){
		$this->load->model('roles_model');
		if ($this->roles_model->view_payment_summary()==0) {
$this->logout();
		}
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Payment Summary';
		$data['description'] = 'Company List';

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

		public function payment_summary2($a){
		$this->load->model('roles_model');
		if ($this->roles_model->view_payment_summary2()==0) {
$this->logout();
		}

		$this->load->model('get_by_id');
		$name =$this->get_by_id->get_company_name_by_id($a);

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = $name;
		$data['a'] = $a;
		$data['description'] = 'Payment List';

		$this->load->view('template/header2',$data);
		$this->load->model('payment_summary_model2');
		$res = $this->payment_summary_model2->get_bill($a);
		$this->load->view('template/container_header_daterange_payment_summary',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('payment_summary2',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer2');


	}

		public function payment_summary_filtered($a){
		$this->load->model('roles_model');
		if ($this->roles_model->view_payment_summary2()==0) {
$this->logout();
		}

		$this->load->model('get_by_id');
		$name =$this->get_by_id->get_company_name_by_id($a);

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = $name;
		$data['a'] = $a;
		$data['description'] = 'Payment List';

		$this->load->library('form_validation');
		$this->form_validation->set_rules('start','start','required');
		$this->form_validation->set_rules('end','end','required');

		if ($this->form_validation->run()) {

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$this->load->model('payment_summary_model');

		$res = $this->payment_summary_model->get_bill_filtered($start,$end);

		$data['result'] = $res;
		$this->load->view('template/header2',$data);
		$this->load->view('template/container_header_daterange',$data);

        if($res){	$data2['result'] = $res;
        	$this->load->view('payment_summary2',$data2);
		}
		else {
			$this->load->view('payment_summary2');
		}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
		}
	}

		public function remaining_balance(){
		$this->load->model('roles_model');
		if ($this->roles_model->view_remaining_balance()==0) {
$this->logout();
		}



		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Remaining Balance';
		$data['description'] = 'Company List';

		$this->load->view('template/header',$data);
		$this->load->model('remaining_balance_model');
		$res = $this->remaining_balance_model->get_bill();
		$this->load->view('template/container_header',$data);
		
		if($res){	$data['result'] = $res;
        	$this->load->view('remaining_balance',$data);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function remaining_balance2($a){
		$this->load->model('roles_model');
		if ($this->roles_model->view_remaining_balance()==0) {
$this->logout();
		}

		$this->load->model('get_by_id');
		$name =$this->get_by_id->get_company_name_by_id($a);
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Remaining Balance';
		$data['a'] = $a;
		$data['description'] = 'Company List';

		$this->load->view('template/header2',$data);
		$this->load->model('remaining_balance_model2');
		$res = $this->remaining_balance_model2->get_bill($a);
		$this->load->view('template/container_header_daterange_remaining_balance',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('remaining_balance2',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer2');
	}

		public function remaining_balance_filtered($a){
		$this->load->model('roles_model');
		if ($this->roles_model->view_remaining_balance()==0) {
$this->logout();
		}
		
		$this->load->model('get_by_id');
		$name =$this->get_by_id->get_company_name_by_id($a);
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['a'] = $a;
		$data['title'] = 'Remaining Balance';
		$data['description'] = 'Company List';


		$this->load->library('form_validation');
		$this->form_validation->set_rules('start','start','required');
		$this->form_validation->set_rules('end','end','required');

		if ($this->form_validation->run()) {

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$this->load->model('remaining_balance_model');

		$res = $this->remaining_balance_model->get_bill_filtered($start,$end);
		$data['result'] = $res;

		$this->load->view('template/header2',$data);
		$this->load->view('template/container_header_daterange_remaining_balance.php',$data);

        if($res){	$data2['result'] = $res;
        	$this->load->view('remaining_balance',$data2);
		}
		else {
			$this->load->view('remaining_balance');
		}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
		}
	}


		public function add_payment(){
		$this->load->model('roles_model');
		if ($this->roles_model->CHECK()==0) {
$this->logout();
		}
		$data = array(
		    'title' => 'Add Payment',
		    'description' => ' '
		);
		$this->load->view('template/header2',$data);
		$this->load->model('add_payment_model');
		$res = $this->add_payment_model->get_bill();
		$this->load->view('template/container_header',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('add_payment',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer2');
	}

		public function company_list(){

		$this->load->model('roles_model');

		if ($this->roles_model->view_company_list_official_receipt_list()==0) {
$this->logout();
		}

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Company List';
		$data['description'] = 'Official Receipt';

		$this->load->view('template/header',$data);
		$this->load->model('company_list_model');
		$res = $this->company_list_model->get_company();
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res;
        	$this->load->view('company_list',$data2);
		}

		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');

	}

		public function official_receipt_list($a){

		$this->load->model('roles_model');

		if ($this->roles_model->view_company_list_official_receipt_list()==0) {
$this->logout();
		}

		$this->load->model('get_by_id');
		$name =$this->get_by_id->get_company_name_by_id($a);

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = $name;
		$data['description'] = 'Official Receipt';

		$this->load->view('template/header2',$data);
		$this->load->model('official_receipt_list_model');
		$res = $this->official_receipt_list_model->get_receipt($a);
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res;
        	$this->load->view('official_receipt_list',$data2);
		}

		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer2');

	}

		public function official_receipt_list2(){

		$this->load->model('roles_model');

		if ($this->roles_model->view_official_receipt_list2()==0) {
		$this->logout();
		}

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Applied Official Receipt List';
		$data['description'] = ' ';

		$this->load->view('template/header',$data);
		$this->load->model('official_receipt_list_model2');
		$res = $this->official_receipt_list_model2->get_receipt();
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res;
        	$this->load->view('official_receipt_list2',$data2);
		}

		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');

	}

		public function view_bill_by_patient($id,$receipt,$company_id){
		$this->load->model('roles_model');
		if ($this->roles_model->add_view_bill_by_patient()==0) {
$this->logout();
		}

		$this->load->model('get_by_id');
		$name = $this->get_by_id->get_patient_name_by_id($id);
		$this->load->model('view_bill_by_patient_model');
		$unapplied = $this->view_bill_by_patient_model->get_unapplied($receipt);

		/*$data = array(
		    'title' => $name,
		    'description' => ' ',
		    'a' => $id,
		    'company_id'=> $company_id
		);*/

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = $name;
		$data['description'] = ' ';
		$data['a'] = $id;
		$data['company_id'] = $company_id;


		$this->load->view('template/header4',$data);
		$this->load->model('view_bill_by_patient_model');
		$res = $this->view_bill_by_patient_model->get_view_bill_by_patient($id);
		$res2 = $this->view_bill_by_patient_model->get_transaction($id);

		if($res){	
			$data2['result'] = $res;
			$data2['result2'] = $res2;
			$data2['receipt'] = $receipt;
			$data2['unapplied'] = $unapplied;

	        $this->load->view('view_bill_by_patient',$data2);
		}

		else {"Fail";}
			$this->load->view('template/footer4');
	}

		public function insert_bill(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hospital_bill','hospital_bill','required');
		$this->form_validation->set_rules('professional_bill','professional_bill','required');
		$this->form_validation->set_rules('company','company','required');
		$this->form_validation->set_rules('patient_type','patient_type','required');
		$this->form_validation->set_rules('id','id','required');

		if ($this->form_validation->run()) {
			

			$hospital_bill = $this->input->post('hospital_bill');
			$professional_bill = $this->input->post('professional_bill');
			$company = $this->input->post('company');
			$patient_type = $this->input->post('patient_type');
			$id = $this->input->post('id');

			$this->load->model('add_bill_model');

			$this->add_bill_model->insert_bill($hospital_bill,$professional_bill,$company,$patient_type,$id);
		}
	}

		public function insert_transaction(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('hospital_bill_payment','hospital_bill_payment','required');
		$this->form_validation->set_rules('professional_bill_payment','professional_bill_payment','required');
		$this->form_validation->set_rules('patient_id','patient_id','required');
		$this->form_validation->set_rules('bill_id','bill_id','required');
		$this->form_validation->set_rules('receipt','receipt','required');
		$this->form_validation->set_rules('company_id','company_id','required');

			$patient_id = $this->input->post('patient_id');
			$bill_id = $this->input->post('bill_id');
			$receipt_id = $this->input->post('receipt_id');
			$hospital_bill_payment = $this->input->post('hospital_bill_payment');
			$professional_bill_payment = $this->input->post('professional_bill_payment');
			$company_id = $this->input->post('company_id');
			

			$this->load->model('view_bill_by_patient_model');

			$this->view_bill_by_patient_model->insert_transaction($hospital_bill_payment,$professional_bill_payment,$patient_id, $bill_id,$receipt_id, $company_id);

	}

		public function add_company(){
				$this->load->model('roles_model');
		if ($this->roles_model->add_company()==0) {
$this->logout();
		}
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Add Company';
		$data['description'] = ' ';

		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
        $this->load->view('add_company');
        $this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function insert_company(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','name','required');
		$this->form_validation->set_rules('type','type','required');
		$this->form_validation->set_rules('address','address','required');
		$this->form_validation->set_rules('contact_person','contact_person','required');
		$this->form_validation->set_rules('contact_number','contact_number','required');

		if ($this->form_validation->run()) {	

			$name = $this->input->post('name');
			$type = $this->input->post('type');
			$address = $this->input->post('address');
			$contact_person = $this->input->post('contact_person');
			$contact_number = $this->input->post('contact_number');

			$this->load->model('add_company_model');
			$this->add_company_model->insert_company($name,$type,$address,$contact_person,$contact_number);
		}
	}


		public function add_account(){
		$this->load->model('roles_model');
		if ($this->roles_model->add_account()==0) {
$this->logout();
		}
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Add Account';
		$data['description'] = ' ';

		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
        $this->load->view('add_account');
        $this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function insert_account(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('email','email','required');

		if ($this->form_validation->run()) {	

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$email = $this->input->post('email');


			$this->load->model('add_account_model');
			$this->add_account_model->insert_account($username,$password,$email);
		}
	}


		public function archive() {
		$this->load->model('roles_model');
		if ($this->roles_model->view_archive()==0) {
$this->logout();
		}
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Archive';
		$data['description'] = ' ';

		$this->load->model('archive_model');
		$res = $this->archive_model->get_patients();
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res;
        	$this->load->view('archive',$data2);
		}
		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function archive_patient($id){
				$this->load->model('roles_model');
		if ($this->roles_model->delete_patients()==0) {
			$this->logout();
		}

		else{
			$this->load->model('archive_model');
			$this->archive_model->archive_patient($id);
		}

	}

		public function archive_or($id){
				$this->load->model('roles_model');
		if ($this->roles_model->delete_or()==0) { 
$this->logout();
		}
		else{
			$this->load->model('archive_model');
			$this->archive_model->archive_or($id);
		}

	}

		public function delete_patient($id){
				$this->load->model('roles_model');
		if ($this->roles_model->permanently_delete()==0) { 
$this->logout();
		}
		else{
			$this->load->model('archive_model');
			$this->archive_model->delete_patient($id);
		}

	}
		public function delete_transaction($id){
			$this->load->model('roles_model');
			if ($this->roles_model->permanently_delete()==0) { 
				$this->logout();
			}
			else{
				$this->load->model('archive_model');
				$this->archive_model->delete_transaction($id);
			}

		}

		public function restore_patient($id){
				$this->load->model('roles_model');
		if ($this->roles_model->restore_archive()==0) {
$this->logout();
		}
		else{
			$this->load->model('archive_model');
			$this->archive_model->restore_patient($id);
		}

	}

		public function roles(){
		$this->load->model('roles_model');
		if ($this->roles_model->edit_roles()==0) {
$this->logout();
		}
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Manage Roles';
		$data['description'] = ' ';

		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
		$this->load->model('roles_model');
		//if ($this->roles_model->can_read()==0) {
		//	header("Location: denied");
		//}
		$res = $this->roles_model->get_users();
       	if($res){	$data2['result'] = $res;
        	$this->load->view('roles',$data2);
		}
        $this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function edit_roles(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id','id','required');


			$id = $this->input->post('id');
			/*$view_data = $this->input->post('view_data');
			$add_data = $this->input->post('add_data');
			$edit_data = $this->input->post('edit_data');
			$delete_data = $this->input->post('delete_data');*/
			$view_dashboard = $this->input->post('view_dashboard');
			$add_patient = $this->input->post('add_patient');
			$view_patients = $this->input->post('view_patients');
			$edit_patients = $this->input->post('edit_patients');
			$delete_patients = $this->input->post('delete_patients');
			$view_accounts_receivable = $this->input->post('view_accounts_receivable');
			$view_accounts_receivable2 = $this->input->post('view_accounts_receivable2');
			$view_payment_summary = $this->input->post('view_payment_summary');
			$view_payment_summary2 = $this->input->post('view_payment_summary2');
			$view_remaining_balance = $this->input->post('view_remaining_balance');
			$view_remaining_balance2 = $this->input->post('view_remaining_balance2');
			$add_official_receipt = $this->input->post('add_official_receipt');
			$view_official_receipt_list2 = $this->input->post('view_official_receipt_list2');
			$delete_official_receipt_list2 = $this->input->post('delete_official_receipt_list2');
			$view_company_list_official_receipt_list = $this->input->post('view_company_list_official_receipt_list');
			$add_patient_to_receipt = $this->input->post('add_patient_to_receipt');
			$add_view_bill_by_patient = $this->input->post('add_view_bill_by_patient');
			$view_list_company = $this->input->post('view_list_company');
			$add_company = $this->input->post('add_company');
			$view_archive = $this->input->post('view_archive');
			$delete_archive = $this->input->post('delete_archive');
			$restore_archive = $this->input->post('restore_archive');
			$add_account = $this->input->post('add_account');
			$edit_roles = $this->input->post('edit_roles');
			$delete_or = $this->input->post('delete_or');
			$permanently_delete = $this->input->post('permanently_delete');



			/*$view_data2 = $view_data == 'on' ? 1 : 0;
			$add_data2 = $add_data == 'on' ? 1 : 0;
			$edit_data2 = $edit_data == 'on' ? 1 : 0;
			$delete_data2 = $delete_data == 'on' ? 1 : 0;*/
			$view_dashboard_a = $view_dashboard == 'on' ? 1 : 0;
			$add_patient_a = $add_patient == 'on' ? 1 : 0;
			$view_patients_a = $view_patients == 'on' ? 1 : 0;
			$edit_patients_a = $edit_patients == 'on' ? 1 : 0;
			$delete_patients_a = $delete_patients == 'on' ? 1 : 0;
			$view_accounts_receivable_a = $view_accounts_receivable == 'on' ? 1 : 0;
			$view_accounts_receivable2_a = $view_accounts_receivable2 == 'on' ? 1 : 0;
			$view_payment_summary_a = $view_payment_summary == 'on' ? 1 : 0;
			$view_payment_summary2_a = $view_payment_summary2 == 'on' ? 1 : 0;
			$view_remaining_balance_a = $view_remaining_balance == 'on' ? 1 : 0;
			$view_remaining_balance2_a = $view_remaining_balance2 == 'on' ? 1 : 0;
			$add_official_receipt_a = $add_official_receipt == 'on' ? 1 : 0;
			$view_official_receipt_list2_a = $view_official_receipt_list2 == 'on' ? 1 : 0;
			$delete_official_receipt_list2_a = $delete_official_receipt_list2 == 'on' ? 1 : 0;
			$view_company_list_official_receipt_list_a = $view_company_list_official_receipt_list == 'on' ? 1 : 0;
			$add_patient_to_receipt_a = $add_patient_to_receipt == 'on' ? 1 : 0;
			$add_view_bill_by_patient_a = $add_view_bill_by_patient == 'on' ? 1 : 0;
			$view_list_company_a = $view_list_company == 'on' ? 1 : 0;
			$add_company_a = $add_company == 'on' ? 1 : 0;
			$view_archive_a = $view_archive == 'on' ? 1 : 0;
			$delete_archive_a = $delete_archive == 'on' ? 1 : 0;
			$restore_archive_a = $restore_archive == 'on' ? 1 : 0;
			$add_account_a = $add_account == 'on' ? 1 : 0;
			$edit_roles_a = $edit_roles == 'on' ? 1 : 0;
			$delete_or_a = $delete_or == 'on' ? 1 : 0;
			$permanently_delete_a = $permanently_delete == 'on' ? 1 : 0;
			$this->load->model('roles_model');

			$this->roles_model->update_role($id,$view_dashboard_a,$add_patient_a,$view_patients_a,$edit_patients_a,$delete_patients_a,$view_accounts_receivable_a,$view_accounts_receivable2_a,$view_payment_summary_a,$view_payment_summary2_a,$view_remaining_balance_a,$view_remaining_balance2_a,$add_official_receipt_a,$view_official_receipt_list2_a,$delete_official_receipt_list2_a,$view_company_list_official_receipt_list_a,$add_patient_to_receipt_a,$add_view_bill_by_patient_a,$view_list_company_a,$add_company_a,$view_archive_a,$delete_archive_a,$restore_archive_a,$add_account_a,$edit_roles_a,$delete_or_a,$permanently_delete_a);
	}


		public function official_receipt(){
				$this->load->model('roles_model');
		if ($this->roles_model->add_official_receipt()==0) {
$this->logout();
		}
		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Add Official Receipt';
		$data['description'] = ' ';

		$this->load->view('template/header',$data);
		$this->load->view('template/container_header2',$data);
		$this->load->view('add_official_receipt');
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

		public function insert_receipt(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('company','company','required');
		$this->form_validation->set_rules('or_date','or_date','required');
		$this->form_validation->set_rules('or_number','or_number','required');
		$this->form_validation->set_rules('or_amount','or_amount','required');

		$company = $this->input->post('company');
		$or_date = $this->input->post('or_date');
		$or_number = $this->input->post('or_number');
		$or_amount = $this->input->post('or_amount');

		$this->load->model('add_or_model');
		$this->add_or_model->insert_receipt($company,$or_date,$or_number,$or_amount);
	}	



		public function delete_bill($a){
		$this->load->model('roles_model');
		if ($this->roles_model->can_delete()==0) {
$this->logout();
		}
		else{
		$this->load->model('delete_bill_model');
		$this->delete_bill_model->delete_bill($a);
		}

	}

		public function mark_receipt($a){
		$this->load->model('roles_model');
		if ($this->roles_model->can_delete()==0) {
$this->logout();
		}
		else{
		$this->load->model('mark_receipt_model');
		$this->mark_receipt_model->mark_receipts($a);
		}

	}

		public function list_company(){

		$this->load->model('roles_model');
		if ($this->roles_model->view_list_company()==0) {
$this->logout();
		}

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Company List';
		$data['description'] = ' ';

		$this->load->view('template/header',$data);
		$this->load->model('list_company_model');
		$res = $this->list_company_model->get_company();
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res;
        	$this->load->view('list_company',$data2);
		}
		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');

	}

			public function payment_history(){

		$this->load->model('roles_model');
		if ($this->roles_model->view_list_company()==0) {
$this->logout();
		}

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Payment History';
		$data['description'] = ' ';

		$this->load->view('template/header',$data);
		$this->load->model('payment_history_model');
		$res = $this->payment_history_model->get_company();
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res;
        	$this->load->view('payment_history',$data2);
		}
		else {"Fail";}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');

	}


		public function duplicate_error($name){

		$this->load->model('roles_model');
		if ($this->roles_model->view_list_company()==0) {
$this->logout();
		}

		$all_access = $this->roles_model->get_all_access();
		$data['all_access'] = $all_access;
		$data['title'] = 'Duplicate Data';
		$data['description'] = '';
		$data['name'] = $name;
		

		$this->load->view('template/header2',$data);
		$this->load->view('template/container_header',$data);

        	$this->load->view('duplicate_error',$data);
		


		$this->load->view('template/container_footer');
		$this->load->view('template/footer');

	}


}