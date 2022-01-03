<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends CI_Controller {
	function __construct() {
        parent::__construct();
       // $this->load->model("front_model");        
    }
		
	/**
	 * 
	 * Get Assessment
	 */
	public function index()
	{
		$data["page_title"] = "Assessment";
		$this->load->view('web/includes/header',$data);		  
		$this->load->view('web/assessment');
		$this->load->view('web/includes/footer');
	}   
}