<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
        parent::__construct();
                
        $this->load->model("front_model");        
    }
	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{	
		$data["page_title"] = "Swadarshana";
		
		$this->load->view('web/includes/header',$data);
		$data["slider"] = $this->front_model->get_slider();
		$this->load->view('web/index',$data);
		$this->load->view('web/includes/footer');
	}

	/**
	 * Privacy Policy
	 *
	 */
	public function privacy_policy()
	{	
		$data["page_title"] = "Swadarshana";
		$data["heading"] = "Privacy Policy";

		$this->load->view('web/includes/header',$data);
		$data["slider"] = $this->front_model->get_slider();
		$this->load->view('web/privacy_policy',$data);
		$this->load->view('web/includes/footer');
	}	

	/**
	 * Security policy
	 *
	 */
	public function security_policy()
	{	
		$data["page_title"] = "Swadarshana";
		$data["heading"] = "Security Policy";
		$this->load->view('web/includes/header',$data);
		$data["slider"] = $this->front_model->get_slider();
		$this->load->view('web/security_policy',$data);
		$this->load->view('web/includes/footer');
	}	
}
