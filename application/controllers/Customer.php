<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Customer extends CI_Controller {

	function __construct() {

        parent::__construct();
    }

	/**

	 * Customer  List Page Load

	 */

	public function index(){

		if ($this->session->userdata("id") == "") {

			redirect("login");

		}

		$data["title"] = "Customer";

		$data["heding"] = "Customer";

		$this->load->view('includes/header',$data);

		$cutmer_data = $this->db->query("select * from customer")->result_array();

		$data["customer"] =$cutmer_data;

		$this->load->view('customer/customer_list',$data);

		$this->load->view('includes/footer');

	}



	/*

	 * Add Blog 

	

	public function add_blog(){

		if ($this->session->userdata("id") == "") {

			redirect("login");

		}

		$data["title"] = "Add Blog";

		$data["heding"] = "Add Blog";

		$this->load->view('includes/header',$data);

		$data["blogcategory"] = $this->blog_model->get_blogcategory();

		$this->load->view('blog/add_blog',$data);

		$this->load->view('includes/footer');

	}





	/*

	 * Insert  Blog 

	

	public function insert(){									

		if (empty($_FILES["blogimage"]["name"])) {

			$this->form_validation->set_rules('blogimage', 'Blog Image', 'required');

		}		

		$this->form_validation->set_rules('title', 'Blog Title', 'required');

		$this->form_validation->set_rules('authername', 'Blog Auther Name', 'required');

		$this->form_validation->set_rules('description', 'Blog Description', 'required');

		$this->form_validation->set_rules('category', 'Blog Category', 'required');



		if ($this->form_validation->run() == FALSE){

            $data["title"] = "Add Blog";

			$data["heding"] = "Add Blog";

			$this->load->view('includes/header',$data);		

			$this->load->view('blog/add_blog');

			$this->load->view('includes/footer');

        }else{           

        	$filename 	= rand(99999,9999)."_".$_FILES["blogimage"]["name"];  

			$this->do_upload($filename,'assets/blogimage','*');    

        	

        	$title  	   = $this->input->post("title");

        	$description   = $this->input->post("description");

        	$authername    = $this->input->post("authername");

        	$blogcategory  = $this->input->post("category");

        	$today_date    = date("Y-m-d");



			$data       =  array("image"=>$filename,"title"=>$title,"description"=>$description,"authername"=>$authername,"category"=>$blogcategory,"today_date"=>$today_date);

			$result 	=  $this->blog_model->insert($data);



			if($result){

				$this->session->set_flashdata("success","Blog  Add Successfully.");

				redirect("blog");

			}else{

				$this->session->set_flashdata("fail","Blog  Not Add Successfully..");

				redirect("blog/add_blog");

			}

    	}		

    }

/*
  * Delete Blog
    public function delete($id)

    {

   		$result = $this->blog_model->delete($id);

   		if ($result) {

   			$this->session->set_flashdata("success","Blog Delete Successfully.");

			redirect("blog");

   		}else{

   			$this->session->set_flashdata("fail","Blog  Not Delete Successfully.");

			redirect("blog");

   		}

    }



    /*

     * Edit Blog 

    

	public function edit($id){

		if ($this->session->userdata("id") == "") {

			redirect("login");

		}

		$data["title"] = "Edit Blog";

		$data["heding"] = "Edit Blog";

		$this->load->view('includes/header',$data);

		$data["blogcategory"] = $this->blog_model->get_blogcategory();

		$data["edit_blog"] = $this->blog_model->edit($id);		

		$this->load->view('blog/edit_blog',$data);

		$this->load->view('includes/footer');

	}	



	/*

	 * Update Blog 

	

	public function update($id)

	{	

		

		$this->form_validation->set_rules('title', 'Blog Title', 'required');

		$this->form_validation->set_rules('authername', 'Blog Auther Name', 'required');

		$this->form_validation->set_rules('description', 'Blog Description', 'required');

		$this->form_validation->set_rules('category', 'Blog Category', 'required');

		if ($this->form_validation->run() == FALSE){

            $data["title"] = "Edit Blog";

			$data["heding"] = "Edit Blog";

			$this->load->view('includes/header',$data);

			$data["blogcategory"] = $this->blog_model->get_blogcategory();

			$data["edit_blog"] = $this->blog_model->edit($id);		

			$this->load->view('blog/edit_blog',$data);

			$this->load->view('includes/footer');

        }else{ 	

	        if (!empty($_FILES["blogimage"]["name"])) {

				$filename 	= rand(99999,9999)."_".$_FILES["blogimage"]["name"];  

				$this->do_upload($filename,'assets/blogimage','*');  

			}else{

				$filename = $this->input->post("old_blogimage");

			}						

			 

        	

        	$title  	   = $this->input->post("title");

        	$description   = $this->input->post("description");

        	$authername    = $this->input->post("authername");

        	$blogcategory  = $this->input->post("category");

        	$today_date    = date("Y-m-d");

			$data       =  array("image"=>$filename,"title"=>$title,"description"=>$description,"authername"=>$authername,"category"=>$blogcategory,"today_date"=>$today_date);



			$result 	=  $this->blog_model->update($data,$id);

			if($result){

				$this->session->set_flashdata("success","Blog Image Update Successfully.");

				redirect("blog");

			}else{

				$this->session->set_flashdata("fail","Blog Image Not Update Successfully..");

				redirect("blog/edit");

			}    			

    	}
    }*/
}