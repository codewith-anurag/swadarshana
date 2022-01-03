<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper('email');
        $this->load->model("login_model");    
        
    }
	/**
	 * Login Page Load
	 */
	public function index(){
		$data["title"] = "Swadarshana | Admin Login";
		$this->load->view('login',$data);
	}
	/*
	 * Check User For Login Validate OR Not
	*/
	public function validate_login()
	{			
		$this->form_validation->set_rules('email', 'Email', 'required|callback_valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE){
            $this->load->view('login');
        }else{
        	
            $email 	  	= $this->input->post("email");
			$password 	= md5($this->input->post("password"));
			$result 	=  $this->login_model->login($email,$password);
			if(!empty($result)){				
				$_SESSION['id']= $result["id"];
				$_SESSION["firstname"]=$result["firstname"];
				$_SESSION["lastname"]=$result["lastname"];
				$_SESSION['logged_in']=TRUE;

				$this->session->set_flashdata("success","Welcome".$this->session->userdata("firstname")."  ".$this->session->userdata("lastname"));
				redirect("login/dashboard");
			}else{
				$this->session->set_flashdata("fail","Invalid Email Or Password.");
				redirect("login");
			}
        }		
	}
	
	public function valid_email($email){
	    if (valid_email($email))
        {
            //echo 'email is valid';exit;
            return true;
        }
        else
        {
            //echo 'email is not valid';exit;
            $this->form_validation->set_message('email', 'Please enter valid email.');
            return false;
		    
        }
	}
	

	public function dashboard()
	{		
		
		// if (!$_SESSION['logged_in']) {
		// 	redirect("login");
		// }
		$data["title"] = "Dashboard";
		$data["heding"] = "Dashboard";
		$this->load->view('includes/header',$data);
		$data["total_slider"] = $this->login_model->get_countslider();
		$data["total_service"] = $this->login_model->get_countservice();
		$data["total_popupservice"] = $this->login_model->get_countpopupservice();
		$data["total_review"] = $this->login_model->get_countreview();
		$data["total_faq"] = $this->login_model->get_countfaq();
		$data["total_fees"] = $this->login_model->get_countfees();
		$this->load->view('home_page',$data);
		$this->load->view('includes/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('firstname');
		$this->session->unset_userdata('lastname');
		$this->session->sess_destroy();
		redirect("login");
	}
}
