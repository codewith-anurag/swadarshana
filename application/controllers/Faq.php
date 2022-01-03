<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("faq_model");        
    }
	/**
	 * Reivew List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "FAQ";
		$data["heding"] = "FAQ";
		$this->load->view('includes/header',$data);
		$data["faq"] = $this->faq_model->get_review();
		$this->load->view('faq/faq_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Slider
	*/
	public function add_faq(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add FAQ";
		$data["heding"] = "Add FAQ";
		$this->load->view('includes/header',$data);		
		$this->load->view('faq/add_faq');
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Slider
	*/
	public function insert()
	{					
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Add FAQ";
			$data["heding"] = "Add FAQ";
			$this->load->view('includes/header',$data);		
			$this->load->view('faq/add_faq');
			$this->load->view('includes/footer');
        }else{
           
        	$question  = $this->input->post("question");
        	$answer    = $this->input->post("answer");
        	
			$data       =  array("question"=>$question,"answer"=>$answer);
			$result 	=  $this->faq_model->insert($data);
			if($result){
				$this->session->set_flashdata("success","FAQ  Add Successfully.");
				redirect("faq");
			}else{
				$this->session->set_flashdata("fail","FAQ  Not Add Successfully..");
				redirect("faq/add_review");
			}
    	}		
    }

    public function delete($id)
    {
   		$result = $this->faq_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","FAQ  Delete Successfully.");
			redirect("faq");
   		}else{
   			$this->session->set_flashdata("fail","FAQ Not Delete Successfully.");
			redirect("faq");
   		}
    }

    /*
     * Edit Faq
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit Faq";
		$data["heding"] = "Edit Faq";
		$this->load->view('includes/header',$data);
		$data["edit_faq"] = $this->faq_model->edit($id);		
		$this->load->view('faq/edit_faq',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Faq
	*/
	public function update($id)
	{	$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Edit Faq";
			$data["heding"] = "Edit Faq";
			$this->load->view('includes/header',$data);
			$data["edit_faq"] = $this->faq_model->edit($id);		
			$this->load->view('faq/edit_faq',$data);
			$this->load->view('includes/footer');
        }else{
           
        	$question  = $this->input->post("question");
        	$answer    = $this->input->post("answer");
        	
			$data       =  array("question"=>$question,"answer"=>$answer);
			$result 	=  $this->faq_model->update($data,$id);
			if($result){
				$this->session->set_flashdata("success","Slider Image Update Successfully.");
				redirect("faq");
			}else{
				$this->session->set_flashdata("fail","Slider Image Not Update Successfully..");
				redirect("faq/add_slider");
			}   		
    	}
	}
}