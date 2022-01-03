<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("front_model");        
    }
	/**
	 * Index Page for this controller.
	 * Get Gallery
	 */
	public function swagallery()
	{
		$data["page_title"] = "Swa Gallery";
		$this->load->view('web/includes/header',$data);
		$data["gallery"] = $this->front_model->get_gallery();		
		$this->load->view('web/gallery',$data);
		$this->load->view('web/includes/footer');
	}
}
