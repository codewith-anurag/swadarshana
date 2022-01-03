<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("event_model");        
    }
	/**
	 * Event  List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Event";
		$data["heding"] = "Event";
		$this->load->view('includes/header',$data);
		$data["event"] = $this->event_model->get_event();
		$this->load->view('event/event_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Event 
	*/
	public function add_event(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Event";
		$data["heding"] = "Add Event";
		$this->load->view('includes/header',$data);		
		$this->load->view('event/add_event',$data);
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Event 
	*/
	public function insert(){									
		if (empty($_FILES["eventimage"]["name"])) {
			$this->form_validation->set_rules('eventimage', 'Event Image', 'required');
		}		
		$this->form_validation->set_rules('title', 'Event Title', 'required');		
		$this->form_validation->set_rules('description', 'Event Description', 'required');		

		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Add Event";
			$data["heding"] = "Add Event";
			$this->load->view('includes/header',$data);		
			$this->load->view('event/add_event',$data);
			$this->load->view('includes/footer');
        }else{           
        	$filename 	= rand(99999,9999)."_".$_FILES["eventimage"]["name"];  
			$this->do_upload($filename,'assets/eventimage','*');    
        	
        	$title  	   = $this->input->post("title");
        	$description   = $this->input->post("description");        	
        	$today_date    = date("Y-m-d");

			$data       =  array("image"=>$filename,"title"=>$title,"description"=>$description,"today_date"=>$today_date);
			$result 	=  $this->event_model->insert($data);

			if($result){
				$this->session->set_flashdata("success","Event  Add Successfully.");
				redirect("event");
			}else{
				$this->session->set_flashdata("fail","Event  Not Add Successfully..");
				redirect("event/add_event");
			}
    	}		
    }

    public function delete($id)
    {
   		$result = $this->event_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Event Delete Successfully.");
			redirect("podcast");
   		}else{
   			$this->session->set_flashdata("fail","Event  Not Delete Successfully.");
			redirect("podcast");
   		}
    }

    /*
     * Edit Event 
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit Event";
		$data["heding"] = "Edit Event";
		$this->load->view('includes/header',$data);		
		$data["edit_event"] = $this->event_model->edit($id);		
		$this->load->view('event/edit_event',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Event 
	*/
	public function update($id)
	{			
		$this->form_validation->set_rules('title', 'Event Title', 'required');
		
		$this->form_validation->set_rules('description', 'Event Description', 'required');
		
		if ($this->form_validation->run() == FALSE){
           	$data["title"] = "Edit Event";
			$data["heding"] = "Edit Event";
			$this->load->view('includes/header',$data);		
			$data["edit_event"] = $this->event_model->edit($id);		
			$this->load->view('event/edit_event',$data);
			$this->load->view('includes/footer');
        }else{ 	
	        if (!empty($_FILES["eventimage"]["name"])) {
				$filename 	= rand(99999,9999)."_".$_FILES["eventimage"]["name"];  
				$this->do_upload($filename,'assets/eventimage','*');  
			}else{
				$filename = $this->input->post("old_eventimage");
			}						
			         	
        	$title  	   = $this->input->post("title");
        	$description   = $this->input->post("description");
        	$authername    = $this->input->post("authername");
        	
        	$today_date  = date("Y-m-d");
			$data        =  array("image"=>$filename,"title"=>$title,"description"=>$description,"today_date"=>$today_date);

			$result 	=  $this->event_model->update($data,$id);
			if($result){
				$this->session->set_flashdata("success","Event Update Successfully.");
				redirect("event");
			}else{
				$this->session->set_flashdata("fail","Event  Not Update Successfully..");
				redirect("event/edit");
			}    			
    	}
    }

    public function do_upload($filename,$path,$type){
		
        $config['upload_path']          = $path;
        $config['allowed_types']        = $type;
        $config['file_name'] 			= $filename;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('eventimage')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);exit;            
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }
}