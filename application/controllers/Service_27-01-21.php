<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("service_model");        
    }
	/**
	 * Service List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Services";
		$data["heding"] = "Services List";
		$this->load->view('includes/header',$data);
		$data["service"] = $this->service_model->get_service();
		$this->load->view('service/service_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Popup Service
	*/
	public function add_service(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Service";
		$data["heding"] = "Add Service";
		$this->load->view('includes/header',$data);		
		$this->load->view('service/add_service');
		$this->load->view('includes/footer');
	}


	/*
	 * Insert   Service
	*/
	public function insert()
	{					
		/*$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('short_description', 'Short Description', 'required');
		$this->form_validation->set_rules('middle_description', 'Middle Description', 'required');
		$this->form_validation->set_rules('long_description', 'Long Description', 'required');*/
		//$this->form_validation->set_rules('last_heding','Last Heding','required');
		
		//if ($this->form_validation->run() == FALSE){
           	/*$data["title"] = "Add Service";
			$data["heding"] = "Add Service";
			$this->load->view('includes/header',$data);		
			$this->load->view('service/add_service');
			$this->load->view('includes/footer');*/
       // }else{

           	$title  	  		= $this->input->post("title");
        	$short_description  = $this->input->post("short_description");
        	$middle_description = $this->input->post("middle_description");
        	$long_description   = $this->input->post("long_description");
        	$last_heding        = $this->input->post("last_heding");
        	

			$data       =  array("title"=>$title,"short_description"=>$short_description,"middle_description"=>$middle_description,"long_description"=>$long_description,"last_heding"=>$last_heding);
			$result 	=  $this->service_model->insert($data);
			if($result){
				$this->session->set_flashdata("success","Service  Add Successfully.");
				redirect("service");
			}else{
				$this->session->set_flashdata("fail","Service  Not Add Successfully..");
				redirect("service/add_service");
			}
    	//}		
    }

    public function delete($id)
    {
   		$result = $this->service_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success"," Service  Delete Successfully.");
			redirect("service");
   		}else{
   			$this->session->set_flashdata("fail"," Service Not Delete Successfully.");
			redirect("service");
   		}
    }

    /*
     * Edit Service 
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit  Service";
		$data["heding"] = "Edit  Service";
		$this->load->view('includes/header',$data);
		$data["edit_service"] = $this->service_model->edit($id);		
		$this->load->view('service/edit_service',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Popupservice
	*/
	public function update($id)
	{	
		/*$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('short_description', 'Short Description', 'required');
		$this->form_validation->set_rules('middle_description', 'Middle Description', 'required');
		$this->form_validation->set_rules('long_description', 'Long Description', 'required');
		$this->form_validation->set_rules('last_heding','Last Heding','required');
		*/
		/*if ($this->form_validation->run() == FALSE){
            $data["title"] = "Edit  Service";
			$data["heding"] = "Edit  Service";
			$this->load->view('includes/header',$data);
			$data["edit_service"] = $this->service_model->edit($id);		
			$this->load->view('service/edit_service',$data);
			$this->load->view('includes/footer');
        /*}else{	*/		
			
			$title  	  		= $this->input->post("title");
        	$short_description  = $this->input->post("short_description");
        	$middle_description = $this->input->post("middle_description");
        	$long_description   = $this->input->post("long_description");
        	$last_heding        = $this->input->post("last_heding");
        	
			$data       =  array("title"=>$title,"short_description"=>$short_description,"middle_description"=>$middle_description,"long_description"=>$long_description,"last_heding"=>$last_heding);
			
			$result 	=  $this->service_model->update($data,$id);
			
			if($result){
				$this->session->set_flashdata("success"," Service  Update Successfully.");
				redirect("service");
			}else{
				$this->session->set_flashdata("fail"," Service  Not Update Successfully..");
				redirect("service/edit");
			}
		/*}*/
    }

	public function do_upload($filename,$path,$type){
		
        $config['upload_path']          = $path;
        $config['allowed_types']        = $type;
        $config['file_name'] 			= $filename;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('serviceimage')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);exit;            
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }
}