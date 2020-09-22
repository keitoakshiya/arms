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
		$this->load->model('roles_model');
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}
		$data = array(
		    'title' => 'Graph Report',
		    'description' => ' '
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);

		$this->load->model('dashboard_model');
		$res = $this->dashboard_model->top_10_bar();
		$data2['result'] = $res;
		$res2 = $this->dashboard_model->guarantor_distribution();
		$data2['result2'] = $res2;
		$res3 = $this->dashboard_model->patient_type_distribution();
		$data2['result3'] = $res3;
		$this->load->view('dashboard',$data2);
		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
	}

	public function patients() {
		$this->load->model('roles_model');

		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}

		$this->load->model('patients_model');
		$res = $this->patients_model->get_patients();
		$data = array(
		    'title' => 'Patients List',
		    'description' => ' '
		);
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

	public function patients_filtered() {

				$data = array(
		    'title' => 'Patients List',
		    'description' => ' '
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('start','start','required');
		$this->form_validation->set_rules('end','end','required');

		if ($this->form_validation->run()) {

			$start = $this->input->post('start');
			$end = $this->input->post('end');
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
	}

	public function add_patient(){
				$this->load->model('roles_model');
		if ($this->roles_model->can_add()==0) {
			header("Location: denied");
		}

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

		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}


		$data = array(
		    'title' => 'Patients List',
		    'description' => ' '
		);
		$this->load->model('add_patient_to_receipt_model');
		$res = $this->add_patient_to_receipt_model->get_patients($a);
		$this->load->view('template/header3',$data);
		$this->load->view('template/container_header',$data);

		if($res){	$data2['result'] = $res; $data2['receipt'] = $b;
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
		$this->load->model('roles_model');
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}

		
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

	public function accounts_receivable2($a){
		$this->load->model('roles_model');
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}
		$data = array(
		    'title' => 'Accounts Receivable',
		    'description' => ' Summary of Accounts Receivable '
		);
		$this->load->view('template/header2',$data);
		$this->load->model('accounts_receivable_model2');
		$res = $this->accounts_receivable_model2->get_bill($a);
		$this->load->view('template/container_header_daterange_accounts_receivable',$data);
		
		if($res){	$data2['result'] = $res;
        	$this->load->view('accounts_receivable2',$data2);
		}
		else {"Fail";}
		
		$this->load->view('template/container_footer');
		$this->load->view('template/footer2');
	}


	public function accounts_receivable_filtered(){
		$data = array(
		    'title' => 'Accounts Receivable',
		    'description' => ' '
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('start','start','required');
		$this->form_validation->set_rules('end','end','required');

		if ($this->form_validation->run()) {

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$this->load->model('accounts_receivable_model');

		$res = $this->accounts_receivable_model->get_bill_filtered($start,$end);


		$this->load->view('template/header',$data);
		$this->load->view('template/container_header_daterange',$data);

        if($res){	$data2['result'] = $res;
        	$this->load->view('accounts_receivable',$data2);
		}
		else {
			$this->load->view('accounts_receivable');
		}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
		}
	}


	public function payment_summary(){
		$this->load->model('roles_model');
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}
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

public function payment_summary2($a){
		$this->load->model('roles_model');
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}
		$data = array(
		    'title' => 'Payment Summary',
		    'description' => ' Total Payment of Bills '
		);
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

	public function payment_summary_filtered(){
		
		$data = array(
		    'title' => 'Payment Summary',
		    'description' => ''
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('start','start','required');
		$this->form_validation->set_rules('end','end','required');

		if ($this->form_validation->run()) {

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$this->load->model('payment_summary_model');

		$res = $this->payment_summary_model->get_bill_filtered($start,$end);


		$this->load->view('template/header',$data);
		$this->load->view('template/container_header_daterange',$data);

        if($res){	$data2['result'] = $res;
        	$this->load->view('payment_summary',$data2);
		}
		else {
			$this->load->view('payment_summary');
		}

		$this->load->view('template/container_footer');
		$this->load->view('template/footer');
		}
	}

	public function remaining_balance(){
		$this->load->model('roles_model');
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}
		$data = array(
		    'title' => 'Remaining Balance',
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

	public function remaining_balance2($a){
		$this->load->model('roles_model');
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}
		$data = array(
		    'title' => 'Remaining Balance',
		    'description' => ' Total Remaining of Balance '
		);
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

	public function remaining_balance_filtered(){


		$data = array(
		    'title' => 'Remaining Balance',
		    'description' => ' '
		);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('start','start','required');
		$this->form_validation->set_rules('end','end','required');

		if ($this->form_validation->run()) {

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$this->load->model('remaining_balance_model');

		$res = $this->remaining_balance_model->get_bill_filtered($start,$end);


		$this->load->view('template/header',$data);
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
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
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

		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}

		$data = array(
		    'title' => 'Official Receipt Company List',
		    'description' => ' '
		);

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

		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}

		$data = array(
		    'title' => 'Official Receipt List',
		    'description' => ' '
		);

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

		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}

		$data = array(
		    'title' => 'Distributed OR List',
		    'description' => ' '
		);

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

	public function view_bill_by_patient($id,$receipt){
		$data = array(
		    'title' => 'Payment Application Page 2',
		    'description' => ' '
		);
		$this->load->view('template/header3',$data);
		$this->load->model('view_bill_by_patient_model');
		$res = $this->view_bill_by_patient_model->get_view_bill_by_patient($id);
		$res2 = $this->view_bill_by_patient_model->get_transaction($id);

		if($res){	
			$data2['result'] = $res;
			$data2['result2'] = $res2;
			$data2['receipt'] = $receipt;
	        $this->load->view('view_bill_by_patient',$data2);
		}

		else {"Fail";}
			$this->load->view('template/footer3');
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

			$patient_id = $this->input->post('patient_id');
			$bill_id = $this->input->post('bill_id');
			$receipt_id = $this->input->post('receipt_id');
			$hospital_bill_payment = $this->input->post('hospital_bill_payment');
			$professional_bill_payment = $this->input->post('professional_bill_payment');
			

			$this->load->model('view_bill_by_patient_model');

			$this->view_bill_by_patient_model->insert_transaction($hospital_bill_payment,$professional_bill_payment,$patient_id, $bill_id,$receipt_id);

	}

	public function add_company(){
				$this->load->model('roles_model');
		if ($this->roles_model->can_add()==0) {
			header("Location: denied");
		}
		$data = array(
		    'title' => 'Add Company',
		    'description' => ' This is where you can add company '
		);
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
		if ($this->roles_model->can_add()==0) {
			header("Location: denied");
		}
		$data = array(
		    'title' => 'Add Account',
		    'description' => ' This is where you can add user accounts '
		);
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
		$data = array(
		    'title' => 'Archive History',
		    'description' => ' '
		);
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
		if ($this->roles_model->can_delete()==0) {
			header("Location: ../denied");
		}
		else{
			$this->load->model('archive_model');
			$this->archive_model->archive_patient($id);
		}

	}

	public function restore_patient($id){
				$this->load->model('roles_model');
		if ($this->roles_model->can_delete()==0) {
			header("Location: ../denied");
		}
		else{
			$this->load->model('archive_model');
			$this->archive_model->restore_patient($id);
		}

	}

	public function roles(){

		$data = array(
		    'title' => 'Add roles',
		    'description' => ' Manage user permission '
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/container_header',$data);
		$this->load->model('roles_model');
		if ($this->roles_model->can_read()==0) {
			header("Location: denied");
		}
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
			$view_data = $this->input->post('view_data');
			$add_data = $this->input->post('add_data');
			$edit_data = $this->input->post('edit_data');
			$delete_data = $this->input->post('delete_data');



			$view_data2 = $view_data == 'on' ? 1 : 0;
			$add_data2 = $add_data == 'on' ? 1 : 0;
			$edit_data2 = $edit_data == 'on' ? 1 : 0;
			$delete_data2 = $delete_data == 'on' ? 1 : 0;
			$this->load->model('roles_model');

			$this->roles_model->update_role($id,$view_data2,$add_data2,$edit_data2,$delete_data2);
	}

	public function official_receipt(){
				$this->load->model('roles_model');
		if ($this->roles_model->can_add()==0) {
			header("Location: denied");
		}
		$data = array(
		    'title' => 'Official Receipt',
		    'description' => ' This is the Official Receipt page'
		);
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
			header("Location: ../denied");
		}
		else{
		$this->load->model('delete_bill_model');
		$this->delete_bill_model->delete_bill($a);
		}

	}

	public function mark_receipt($a){
		$this->load->model('roles_model');
		if ($this->roles_model->can_delete()==0) {
			header("Location: ../denied");
		}
		else{
		$this->load->model('mark_receipt_model');
		$this->mark_receipt_model->mark_receipts($a);
		}

	}

}