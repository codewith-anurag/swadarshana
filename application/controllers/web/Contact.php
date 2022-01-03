<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("front_model");   
        $this->load->library("pagination");
        $this->load->library('email');      
    }

	/**
	 * 
	 * Get Contact
	 */
	public function index()
	{
        $data["page_title"] = "Swa Contact";
		$this->load->view('web/includes/header',$data);			
		$this->load->view('web/contact',$data);
		$this->load->view('web/includes/footer');
	}

	public function inquiry()
	{
		$name    = $this->input->post("name");
		$email   = $this->input->post("email");
		$phone   = $this->input->post("phone");
		$message = $this->input->post("message");


		$from_email = "noreply@swadarshana.com"; 

		$this->email->from($from_email, 'Swadarshana.com'); 
        $this->email->to("care@swadarshana.com"); //manish.khernar@gmail.com manish.khernar@gmail.com

        $this->email->subject('Swadarshana.com | Website Inquiry '); 
        $this->email->set_mailtype("html");
        
        $message = "Hello Admin,<br/><br/>A new Inquiry has Arrived at  Swadarshana website.</br><br/></br><br/> <table border='2'><tr><th>Name : </th><td>".$name."</td></tr> 
        <tr><th>Email : </th><td>".$this->input->post("email")."</td></tr><tr><th>Phone : </th><td>".$this->input->post("phone")."</td></tr><tr><th>Message : </th><td>".$this->input->post("message")."</td></tr></table><br/><br/> Regards, <br> www.swadarshana.com";
         $this->email->message($message); 
   
        //Send mail 
        if($this->email->send()){
           // echo 1;        	
        	$this->session->set_flashdata("success","We have received your inquiry and we will get back to you in next 24 hours, You can chat with us on the chat window too.");
        	redirect(base_url("web/contact"));
        }else {                        
            //echo 0;
            $this->session->set_flashdata("fail","Something went wrong.");
            redirect(base_url("web/contact"));
        }

	}
	
}
