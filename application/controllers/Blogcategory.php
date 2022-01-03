<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogcategory extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("blogcategory_model");        
    }
	/**
	 * Blog Category List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Blog Category";
		$data["heding"] = "Blog Category";
		$this->load->view('includes/header',$data);
		$data["blogcategory"] = $this->blogcategory_model->get_blogcategory();
		$this->load->view('blogcategory/blogcategory_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Blog Category
	*/
	public function add_blogcategory(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Blog Category";
		$data["heding"] = "Add Blog Category";
		$this->load->view('includes/header',$data);		
		$this->load->view('blogcategory/add_blogcategory');
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Blog Category
	*/
	public function insert(){							
		$this->form_validation->set_rules('category', 'Blog Category', 'required');		
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Add Blog Category";
			$data["heding"] = "Add Blog Category";
			$this->load->view('includes/header',$data);		
			$this->load->view('blogcategory/add_blogcategory');
			$this->load->view('includes/footer');
        }else{           
        	$blogcategory  = $this->input->post("category");
			$data       =  array("category"=>$blogcategory);

			$result 	=  $this->blogcategory_model->insert($data);
			if($result){
				$this->session->set_flashdata("success","Blog Category  Add Successfully.");
				redirect("blogcategory");
			}else{
				$this->session->set_flashdata("fail","Blog Category  Not Add Successfully..");
				redirect("blogcategory/add_blogcategory");
			}
    	}		
    }

    public function delete($id)
    {
   		$result = $this->blogcategory_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Blog Category  Delete Successfully.");
			redirect("blogcategory");
   		}else{
   			$this->session->set_flashdata("fail","Blog Category Not Delete Successfully.");
			redirect("blogcategory");
   		}
    }

    /*
     * Edit Blog Category
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit Blog Category";
		$data["heding"] = "Edit Blog Category";
		$this->load->view('includes/header',$data);
		$data["edit_blogcategory"] = $this->blogcategory_model->edit($id);		
		$this->load->view('blogcategory/edit_blogcategory',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Blog Category
	*/
	public function update($id)
	{	$this->form_validation->set_rules('category', 'Blog Category', 'required');		
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Edit Blog Category";
			$data["heding"] = "Edit Blog Category";
			$this->load->view('includes/header',$data);
			$data["edit_blogcategory"] = $this->blogcategory_model->edit($id);		
			$this->load->view('blogcategory/edit_blogcategory',$data);
			$this->load->view('includes/footer');
        }else{					
			$blogcategory  = $this->input->post("category");
			$data       =  array("category"=>$blogcategory);

			$result 	=  $this->blogcategory_model->update($data,$id);
			if($result){
				$this->session->set_flashdata("success","Blog Category Update Successfully.");
				redirect("blogcategory");
			}else{
				$this->session->set_flashdata("fail","Blog Category Not Update Successfully..");
				redirect("blogcategory/edit");
			}    			
    	}
    }	
}