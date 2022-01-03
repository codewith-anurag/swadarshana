<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("slider_model");        
    }
	/**
	 * Slider List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Slider";
		$data["heding"] = "Sliders";
		$this->load->view('includes/header',$data);
		$data["slider"] = $this->slider_model->get_slider();
		$this->load->view('slider/slider_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Slider
	*/
	public function add_slider(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Slider";
		$data["heding"] = "Add Slider";
		$this->load->view('includes/header',$data);		
		$this->load->view('slider/add_slider');
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Slider
	*/
	public function insert()
	{					
		$filename 	= rand(99999,9999)."_".$_FILES["sliderimage"]["name"];            
		$url = $this->input->post("url");
		$this->do_upload($filename,'assets/sliderimage','*');
		$data       =  array("url"=>$url,"slider_image"=>$filename);
		$result 	=  $this->slider_model->insert($data);
		if($result){
			$this->session->set_flashdata("success","Slider Image Add Successfully.");
			redirect("slider");
		}else{
			$this->session->set_flashdata("fail","Slider Image Not Add Successfully..");
			redirect("slider/add_slider");
		}
    			
    }

    /*
     * Edit Slider
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit Slider";
		$data["heding"] = "Edit Slider";
		$this->load->view('includes/header',$data);
		$data["editslider"] = $this->slider_model->edit($id);		
		$this->load->view('slider/edit_slider',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Slider
	*/	
	public function update($id)
	{				
		if(!empty($_FILES["sliderimage"]["name"]) && isset($_FILES["sliderimage"]["name"])){
			$filename 	= rand(99999,9999)."_".$_FILES["sliderimage"]["name"];  
			$this->do_upload($filename,'assets/sliderimage','*');          	
		}else{
			$filename = $this->input->post("old_sliderimage");
		}			
		$url = $this->input->post("url");
		$data       =  array("url"=>$url,"slider_image"=>$filename);
		$result 	=  $this->slider_model->update($data,$id);
		if($result){
			$this->session->set_flashdata("success","Slider Image Update Successfully.");
			redirect("slider");
		}else{
			$this->session->set_flashdata("fail","Slider Image Not Update Successfully..");
			redirect("slider/edit");
		}    			
    }

    public function delete($id){
   		$result = $this->slider_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Slider  Delete Successfully.");
			redirect("slider");
   		}else{
   			$this->session->set_flashdata("fail","Slider Not Delete Successfully.");
			redirect("slider");
   		}
    }

	public function do_upload($filename,$path,$type){
		
        $config['upload_path']          = $path;
        $config['allowed_types']        = $type;
        $config['file_name'] 			= $filename;
        $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('sliderimage')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);exit;            
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }
}