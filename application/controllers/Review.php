<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("review_model");        
    }
	/**
	 * Reivew List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Reivew";
		$data["heding"] = "Reivew";
		$this->load->view('includes/header',$data);
		$data["review"] = $this->review_model->get_review();
		$this->load->view('review/review_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Slider
	*/
	public function add_review(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Reivew";
		$data["heding"] = "Add Reivew";
		$this->load->view('includes/header',$data);		
		$this->load->view('review/add_review');
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Slider
	*/
	public function insert()
	{					
		$this->form_validation->set_rules('review', 'Review', 'required');
		$this->form_validation->set_rules('name', 'Your Name', 'required');
		$this->form_validation->set_rules('rating', 'Review Rating', 'required');
		if (empty($_FILES["user_image"]["name"])) {
			$this->form_validation->set_rules('user_image', 'Review User Image', 'required');
		}
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Add Review";
			$data["heding"] = "Add Review";
			$this->load->view('includes/header',$data);		
			$this->load->view('review/add_review');
			$this->load->view('includes/footer');
        }else{
           
        	$filename = rand(99999, 9999) . "_" .$_FILES["user_image"]["name"];
            $this->do_upload($filename, 'assets/review_userimage','user_image','*');

        	$review  = $this->input->post("review");
        	$name    = $this->input->post("name");
        	$rating  = $this->input->post("rating");

			$data       =  array("user_image"=>$filename,"review"=>$review,"name"=>$name,"rating"=>$rating);
			$result 	=  $this->review_model->insert($data);
			if($result){
				$this->session->set_flashdata("success","Review  Add Successfully.");
				redirect("review");
			}else{
				$this->session->set_flashdata("fail","Review  Not Add Successfully..");
				redirect("review/add_review");
			}
    	}		
    }

    public function delete($id)
    {
   		$result = $this->review_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Review  Delete Successfully.");
			redirect("review");
   		}else{
   			$this->session->set_flashdata("fail","Review Not Delete Successfully.");
			redirect("review");
   		}
    }

	public function edit($id=""){
    	if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		if(!empty($_POST)){
			$id = $this->input->post("id");
			if(!empty($_FILES["user_image"]["name"])){
				$filename = rand(99999, 9999) . "_" .$_FILES["user_image"]["name"];
	            $this->do_upload($filename, 'assets/review_userimage','user_image','*');
	        }else{
	        	$filename = $this->input->post("old_user_image");
	        }

        	$review  = $this->input->post("review");
        	$name    = $this->input->post("name");
        	$rating  = $this->input->post("rating");
        	$order 	 = $this->input->post("order");

			$data       =  array("user_image"=>$filename,"review"=>$review,"name"=>$name,"rating"=>$rating,"index_order"=>$order);
			$result 	=  $this->review_model->update($data,$id);
			if($result){
				$this->session->set_flashdata("success","Review  Update Successfully.");
				redirect("review");
			}else{
				$this->session->set_flashdata("fail","Review  Not Update Successfully..");
				redirect("review/edit/".$id);
			}

		}
		
		$data["title"] = "Edit Reivew";
		$data["heding"] = "Edit Reivew";
		$this->load->view('includes/header',$data);		
		$edit_review = $this->review_model->edit($id);
		$data["edit_review"] = $edit_review;
		
		$this->load->view('review/edit_review',$data);
		$this->load->view('includes/footer');
    }

    public function do_upload($filename, $path, $control,$type) {

        $config['upload_path'] = $path;
        $config['allowed_types'] = $type;
        $config['file_name'] = $filename;
        $config['remove_spaces'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($control)) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            exit;
        } else {
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }
}