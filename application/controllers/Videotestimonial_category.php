<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videotestimonial_category extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("videotestimonial_category_model");        
    }
	/**
	 * Video Testimonial Category List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Video Testimonial Category";
		$data["heding"] = "Video Testimonial Category";
		$this->load->view('includes/header',$data);
		$data["blogcategory"] = $this->videotestimonial_category_model->get_blogcategory();
		$this->load->view('video_testimonial_category/video_testimonial_category_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Video Testimonial Category
	*/
	public function add_video_testimonial_category(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Video Testimonial Category";
		$data["heding"] = "Add Video Testimonial Category";
		$this->load->view('includes/header',$data);		
		$this->load->view('video_testimonial_category/add_video_testimonial_category');
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Video Testimonial Category
	*/
	public function insert(){							
		$this->form_validation->set_rules('category', 'Video Testimonial Category', 'required');		
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Add Video Testimonial Category";
			$data["heding"] = "Add Video Testimonial Category";
			$this->load->view('includes/header',$data);		
			$$this->load->view('video_testimonial_category/add_video_testimonial_category');
			$this->load->view('includes/footer');
        }else{           
        	$blogcategory  = $this->input->post("category");
			$data       =  array("category"=>$blogcategory);

			$result 	=  $this->videotestimonial_category_model->insert($data);
			if($result){
				$this->session->set_flashdata("success","Video Testimonial Category  Add Successfully.");
				redirect("videotestimonial_category");
			}else{
				$this->session->set_flashdata("fail","Blog Category  Not Add Successfully..");
				redirect("videotestimonial_category/add_video_testimonial_category");
			}
    	}		
    }

    public function delete($id)
    {
   		$result = $this->videotestimonial_category_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Video Testimonial Category  Delete Successfully.");
			redirect("videotestimonial_category");
   		}else{
   			$this->session->set_flashdata("fail","Video Testimonial Category Not Delete Successfully.");
			redirect("videotestimonial_category");
   		}
    }

    /*
     * Edit Video Testimonial Category
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit Video Testimonial Category";
		$data["heding"] = "Edit Video Testimonial Category";
		$this->load->view('includes/header',$data);
		$data["edit_blogcategory"] = $this->videotestimonial_category_model->edit($id);		
		$this->load->view('video_testimonial_category/edit_video_testimonial_category',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Video Testimonial Category
	*/
	public function update($id)
	{	$this->form_validation->set_rules('category', 'Video Testimonial Category', 'required');		
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Edit Video Testimonial Category";
			$data["heding"] = "Edit Video Testimonial Category";
			$this->load->view('includes/header',$data);
			$data["edit_blogcategory"] = $this->videotestimonial_category_model->edit($id);		
			$this->load->view('video_testimonial_category/edit_blogcategory',$data);
			$this->load->view('includes/footer');
        }else{					
			$blogcategory  = $this->input->post("category");
			$data       =  array("category"=>$blogcategory);

			$result 	=  $this->videotestimonial_category_model->update($data,$id);
			if($result){
				$this->session->set_flashdata("success","Video Testimonial Category Update Successfully.");
				redirect("videotestimonial_category");
			}else{
				$this->session->set_flashdata("fail","Video Testimonial Category Not Update Successfully..");
				redirect("videotestimonial_category/edit");
			}    			
    	}
    }	
}