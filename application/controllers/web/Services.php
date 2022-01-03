<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("front_model");        
    }
	/**
	 * Index Page for this controller.
	 * Get Services
	 */
	public function service($service_title)
	{
		$service_titles = str_replace("%20"," ", $service_title);
		$data["page_title"] = "Swadarshana";
		$this->load->view('web/includes/header',$data);
		$data["service"] = $this->front_model->get_services_detail($service_titles);				
		$serviceID= get_serviceID($service_titles);
		

		$data["subservice"]  = $this->front_model->get_subservice($serviceID);
		$this->load->view('web/service',$data);
		$this->load->view('web/includes/footer');
	}

	/**
	 * Get Sub Service
	 * 
	 */
	 public function sub_service($slug)
	 {
	 	$service_titles = str_replace("_"," ", $slug);
	 	$data["page_title"] = $service_titles;
	 	$this->load->view('web/includes/header',$data);
	 	$ex = $this->db->query("select id from popupservice_master where slug = '$slug'");
	 	$result = $ex->row();
	 	$data["subservice"] = $this->front_model->get_popupservice_detail($result->id);	 	
	 	//print_r($data["subservice"]);exit;
	 	$this->load->view('web/subservices',$data);
		$this->load->view('web/includes/footer');
	 }

	/**
	 * 
	 * Get Popup Services Detail 
	 */
	public function get_popupservice_detail()
	{
		$popupservice_id = $this->input->post("subserviceid");
		$popupservice_array = $this->front_model->get_popupservice_detail($popupservice_id);				
		echo json_encode($popupservice_array);exit;
	}

}
