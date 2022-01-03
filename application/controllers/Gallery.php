<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("gallery_model");        
    }
	/**
	 * Gallery List Page Load
	 */
	public function index(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Gallery";
		$data["heding"] = "Gallery";
		$this->load->view('includes/header',$data);
		$data["gallery"] = $this->gallery_model->get_gallery();
		$this->load->view('gallery/gallery_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Gallery
	*/
	public function add_gallery(){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Add Gallery";
		$data["heding"] = "Add Gallery";
		$this->load->view('includes/header',$data);		
		$this->load->view('gallery/add_gallery');
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Gallery
	*/
	public function insert()
	{	

		if(!empty($_FILES["galleryimage"]["name"][0]) && !isset($_FILES["galleryimage"]["name"][0])){
			$this->form_validation->set_rules("galleryimage","Gallery Image","required");
		}
		for ($i=0; $i <count($_FILES["galleryimage"]["name"]) ; $i++) { 
			$filename 	= rand(99999,9999)."_".$_FILES["galleryimage"]["name"][$i];            
			$temp_name  = $_FILES["galleryimage"]["tmp_name"][$i];
			move_uploaded_file($temp_name, "assets/galleryimage/".$filename);
			$data       =  array("gallery_image"=>$filename);
			$result 	=  $this->gallery_model->insert($data);
		}					
		
		if($result){
			$this->session->set_flashdata("success","Gallery Image Add Successfully.");
			redirect("gallery");
		}else{
			$this->session->set_flashdata("fail","Gallery Image Not Add Successfully..");
			redirect("gallery/add_gallery");
		}
    			
    }

    /*
     * Edit Gallery
    */
	public function edit($id){
		if ($this->session->userdata("id") == "") {
			redirect("login");
		}
		$data["title"] = "Edit Gallery";
		$data["heding"] = "Edit Gallery";
		$this->load->view('includes/header',$data);
		$data["editgallery"] = $this->gallery_model->edit($id);		
		$this->load->view('gallery/edit_gallery',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Gallery
	*/	
	public function update($id)
	{				
		if(!empty($_FILES["galleryimage"]["name"]) && isset($_FILES["galleryimage"]["name"])){
			$filename 	= rand(99999,9999)."_".$_FILES["galleryimage"]["name"];  
			$this->do_upload($filename,'assets/galleryimage','*');          	
		}else{
			$filename = $this->input->post("old_galleryimage");
		}			
		
		$data       =  array("gallery_image"=>$filename);
		$result 	=  $this->gallery_model->update($data,$id);
		if($result){
			$this->session->set_flashdata("success","Gallery Image Update Successfully.");
			redirect("gallery");
		}else{
			$this->session->set_flashdata("fail","Gallery Image Not Update Successfully..");
			redirect("gallery/edit");
		}    			
    }

    public function delete($id){
   		$result = $this->gallery_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Gallery  Delete Successfully.");
			redirect("gallery");
   		}else{
   			$this->session->set_flashdata("fail","Gallery Not Delete Successfully.");
			redirect("gallery");
   		}
    }

	public function do_upload($filename,$path,$type){
		
        $config['upload_path']          = $path;
        $config['allowed_types']        = $type;
        $config['file_name'] 			= $filename;
        $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('galleryimage')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);exit;            
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }
}