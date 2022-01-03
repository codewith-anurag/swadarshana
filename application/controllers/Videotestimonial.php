<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videotestimonial extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("videotestimonial_model");        
    }
	/**
	 * Video Testimonial List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Video Testimonial";
		$data["heding"] = "Video Testimonial";
		$this->load->view('includes/header',$data);
		$data["video"] = $this->videotestimonial_model->get_videotestimonial();
		$this->load->view('videotestimonial/videotestimonial_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Video Testimonial
	*/
	public function add_videotestimonial(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Video Testimonial";
		$data["heding"] = "Add Video Testimonial";
		$this->load->view('includes/header',$data);		
		$category = $this->db->get("videotestimonial_category_master")->result();
		$data["category"] = $category;
		$this->load->view('videotestimonial/add_videotestimonial',$data);
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Video Testimonial
	*/
	public function insert()
	{	
		$this->form_validation->set_rules("title","Video Title","required");
		if(!empty($_FILES["video_thumbnail"]["name"]) && !isset($_FILES["video_thumbnail"]["name"])){
			$this->form_validation->set_rules("video_thumbnail","Video Thumbnail","required");
		}
		
		$this->form_validation->set_rules("video","Video Iframe","required");
		if($this->form_validation->run() == FALSE){
			$data["title"] = "Add Video Testimonial";
			$data["heding"] = "Add Video Testimonial";
			$this->load->view('includes/header',$data);		
			$this->load->view('videotestimonial/add_videotestimonial');
			$this->load->view('includes/footer');
		}else{
			$filename 	= rand(99999,9999)."_".$_FILES["video_thumbnail"]["name"];            
			$this->do_upload($filename,'assets/videotestimonial_thumbnail','*');

			$category   = $this->input->post("category");
			$title = $this->input->post("title");
			$video = $this->input->post("video");
			$data       =  array("category"=>$category ,"title"=>$title,"video_thumbnail"=>$filename,"video"=>$video);
			$result 	=  $this->videotestimonial_model->insert($data);		
			if($result){
				$this->session->set_flashdata("success","Video Testimonial  Add Successfully.");
				redirect("videotestimonial");
			}else{
				$this->session->set_flashdata("fail","Video Testimonial Not Add Successfully..");
				redirect("videotestimonial/add_videotestimonial");
			}
		}
    }

    /*
     * Edit Video Testimonial
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit Video Testimonial";
		$data["heding"] = "Edit Video Testimonial";
		$this->load->view('includes/header',$data);
		$category = $this->db->get("videotestimonial_category_master")->result();
		$data["category"] = $category;
		$data["edit_vtesti"] = $this->videotestimonial_model->edit($id);
		
		$this->load->view('videotestimonial/edit_videotestimonial',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Slider
	*/	
	public function update($id)
	{				
		if(!empty($_POST)){
			$id = $this->input->post("id");
			if(!empty($_FILES["video_thumbnail"]["name"])){
				$filename = rand(99999, 9999) . "_" .$_FILES["video_thumbnail"]["name"];
	            $this->do_upload($filename, 'assets/videotestimonial_thumbnail','video_thumbnail','*');
	        }else{
	        	$filename = $this->input->post("old_video_thumbnail");
	        }
	        $category   = $this->input->post("category");
        	$title = $this->input->post("title");
			$video = $this->input->post("video");
        	$order 	 = $this->input->post("order");


			$data       =  array("category"=>$category,"title"=>$title,"video_thumbnail"=>$filename,"video"=>$video,"index_order"=>$order);
			
			$result 	=  $this->videotestimonial_model->update($data,$id);
			if($result){
				$this->session->set_flashdata("success","Video Testimonial  Update Successfully.");
				redirect("videotestimonial");
			}else{
				$this->session->set_flashdata("fail","Video Testimonial  Not Update Successfully..");
				redirect("videotestimonial/edit/".$id);
			}

		}
    }

    /*
     * Delete Video Testimonial 
    */

    public function delete($id){
   		$result = $this->videotestimonial_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Videotestimonial  Delete Successfully.");
			redirect("slider");
   		}else{
   			$this->session->set_flashdata("fail","Videotestimonial Not Delete Successfully.");
			redirect("slider");
   		}
    }

	public function do_upload($filename,$path,$type){
		
        $config['upload_path']          = $path;
        $config['allowed_types']        = $type;
        $config['file_name'] 			= $filename;
        $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('video_thumbnail')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);exit;            
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }
}