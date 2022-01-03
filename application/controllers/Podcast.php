<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Podcast extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("podcast_model");        
    }
	/**
	 * Podcast  List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Podcast";
		$data["heding"] = "Podcast";
		$this->load->view('includes/header',$data);
		$data["podcast"] = $this->podcast_model->get_podcast();
		$this->load->view('podcast/podcast_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Podcast 
	*/
	public function add_podcast(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Podcast";
		$data["heding"] = "Add Podcast";
		$this->load->view('includes/header',$data);		
		$this->load->view('podcast/add_podcast',$data);
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Podcast 
	*/
	public function insert(){									
		if (empty($_FILES["podcastimage"]["name"])) {
			$this->form_validation->set_rules('podcastimage', 'Podcast Image', 'required');
		}		
		$this->form_validation->set_rules('title', 'Podcast Title', 'required');
		$this->form_validation->set_rules('authername', 'Podcast Auther Name', 'required');
		$this->form_validation->set_rules('description', 'Podcast Description', 'required');		

		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Add Podcast";
			$data["heding"] = "Add Podcast";
			$this->load->view('includes/header',$data);			
			$this->load->view('podcast/add_podcast',$data);
			$this->load->view('includes/footer');
        }else{           
        	$filename 	= rand(99999,9999)."_".$_FILES["podcastimage"]["name"];  
			$this->do_upload($filename,'assets/podcastimage','*');    
        	
        	$title  	   = $this->input->post("title");
        	$description   = $this->input->post("description");
        	$authername    = $this->input->post("authername");        	
        	$today_date    = date("Y-m-d");
        	$url = $this->input->post("url");

			$data       =  array("image"=>$filename,"url"=>$url,"title"=>$title,"description"=>$description,"authername"=>$authername,"today_date"=>$today_date);
			$result 	=  $this->podcast_model->insert($data);

			if($result){
				$this->session->set_flashdata("success","Podcast  Add Successfully.");
				redirect("podcast");
			}else{
				$this->session->set_flashdata("fail","Podcast  Not Add Successfully..");
				redirect("podcast/add_podcast");
			}
    	}		
    }

    public function delete($id)
    {
   		$result = $this->podcast_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Podcast Delete Successfully.");
			redirect("podcast");
   		}else{
   			$this->session->set_flashdata("fail","Podcast  Not Delete Successfully.");
			redirect("podcast");
   		}
    }

    /*
     * Edit Podcast 
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit Podcast";
		$data["heding"] = "Edit Podcast";
		$this->load->view('includes/header',$data);		
		$data["edit_podcast"] = $this->podcast_model->edit($id);		
		$this->load->view('podcast/edit_podcast',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Podcast 
	*/
	public function update($id)
	{	
		
		$this->form_validation->set_rules('title', 'Podcast Title', 'required');
		$this->form_validation->set_rules('authername', 'Podcast Auther Name', 'required');
		$this->form_validation->set_rules('description', 'Podcast Description', 'required');
		
		if ($this->form_validation->run() == FALSE){
           $data["title"] = "Edit Podcast";
			$data["heding"] = "Edit Podcast";
			$this->load->view('includes/header',$data);		
			$data["edit_podcast"] = $this->podcast_model->edit($id);		
			$this->load->view('podcast/edit_podcast',$data);
			$this->load->view('includes/footer');
        }else{ 	
	        if (!empty($_FILES["podcastimage"]["name"])) {
				$filename 	= rand(99999,9999)."_".$_FILES["podcastimage"]["name"];  
				$this->do_upload($filename,'assets/podcastimage','*');  
			}else{
				$filename = $this->input->post("old_podcastimage");
			}						
			         	
        	$title  	   = $this->input->post("title");
        	$description   = $this->input->post("description");
        	$authername    = $this->input->post("authername");
        	$url 		   = $this->input->post("url");
        	$today_date  = date("Y-m-d");
			$data        =  array("image"=>$filename,"url"=>$url,"title"=>$title,"description"=>$description,"authername"=>$authername,"today_date"=>$today_date);

			$result 	=  $this->podcast_model->update($data,$id);
			if($result){
				$this->session->set_flashdata("success","Podcast Update Successfully.");
				redirect("podcast");
			}else{
				$this->session->set_flashdata("fail","Podcast Image Not Update Successfully..");
				redirect("podcast/edit");
			}    			
    	}
    }

    public function do_upload($filename,$path,$type){
		
        $config['upload_path']          = $path;
        $config['allowed_types']        = $type;
        $config['file_name'] 			= $filename;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('podcastimage')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);exit;            
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }
}