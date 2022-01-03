
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SwashoppeCategory extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("swashoppecategory_model");        
    }
	/**
	 * Swashoppe Video Category List Page Load
	 */
	public function index(){
		// if ($this->session->userdata("id") == "") {
		// 	redirect("login");
		// }
		$data["title"] = "Swashoppe Video Courses";
		$data["heding"] = "Swashoppe Video Courses";
		$this->load->view('includes/header',$data);
		$data["albumcategory"] = $this->swashoppecategory_model->get_albumcategory();
		$this->load->view('swashoppecategory/swashoppe_category_list',$data);
		$this->load->view('includes/footer');
	}

	/*
	 * Add Swashoppe Video Category
	*/
	public function add_swashoppe_category(){
		// if ($this->session->userdata("id") == "") {
		// 	redirect("login");
		// }
		$data["title"] = "Add Swashoppe Video Courses";
		$data["heding"] = "Add Swashoppe Video Courses";
		$this->load->view('includes/header',$data);		
		$data["supercategory"] = $this->db->get("swashoppe_category")->result_array();
		$this->load->view('swashoppecategory/add_swashoppe_category',$data);
		$this->load->view('includes/footer');
	}


	/*
	 * Insert  Swashoppe Video Category
	*/
	public function insert(){							
		$this->form_validation->set_rules('category', 'Swashoppe Video  Courses', 'required');	
		if($this->input->post("category") == 1)	{
			$this->form_validation->set_rules('price', 'Swashoppe Courses Price', 'required|numeric');	
		}
		if(empty($_FILES["category_banner"]["name"]))	{
			$this->form_validation->set_rules('category_banner', 'Swashoppe Video  Courses Banner', 'required');	
		}
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Add Swashoppe Video Courses";
			$data["heding"] = "Add Swashoppe Video Courses";
			$this->load->view('includes/header',$data);		
			$data["supercategory"] = $this->db->get("swashoppe_category")->result_array();
			$this->load->view('swashoppecategory/add_swashoppe_category',$data);
			$this->load->view('includes/footer');
        }else{        
			$filename 	= rand(99999,9999)."_".$_FILES["category_banner"]["name"];            
			$this->do_upload($filename,'assets/swashoppe_category_banner','*');  
			$supercategory  = $this->input->post("supercategory"); 
        	$category  = $this->input->post("category");
        	$price     = $this->input->post("price");
			$data       =  array("category"=>$supercategory,"price"=>$price,"title"=>$category,"banner"=>$filename);

			$result 	=  $this->swashoppecategory_model->insert($data);
			if($result){
				$this->session->set_flashdata("success","Swashoppe Courses  Add Successfully.");
				redirect("SwashoppeCategory");
			}else{
				$this->session->set_flashdata("fail","Swashoppe Courses  Not Add Successfully..");
				redirect("SwashoppeCategory/add_swashoppe_category");
			}
    	}		
    }

    public function delete($id)
    {
   		$result = $this->swashoppecategory_model->delete($id);
   		if ($result) {
   			$this->session->set_flashdata("success","Swashoppe Courses  Delete Successfully.");
			redirect("SwashoppeCategory");
   		}else{
   			$this->session->set_flashdata("fail","Swashoppe Courses Not Delete Successfully.");
			redirect("SwashoppeCategory");
   		}
    }

    /*
     * Edit Swashoppe Video Category
    */
	public function edit($id){
		// if ($this->session->userdata("id") == "") {
		// 	redirect("login");
		// }
		$data["title"] = "Edit Swashoppe Video Courses";
		$data["heding"] = "Edit Swashoppe Video Courses";
		$this->load->view('includes/header',$data);
		$data["supercategory"] = $this->db->get("swashoppe_category")->result_array();
		$data["edit_swashoppecategory"] = $this->swashoppecategory_model->edit($id);	
			
		$this->load->view('swashoppecategory/edit_swashoppe_category',$data);
		$this->load->view('includes/footer');
	}	

	/*
	 * Update Swashoppe Video Category
	*/
	public function update($id)
	{	$this->form_validation->set_rules('category', 'Swashoppe Video  Courses', 'required');
		if($this->input->post("category") == 1)	{
			$this->form_validation->set_rules('price', 'Swashoppe Courses Price', 'required|numeric');	
		}	
			
		if ($this->form_validation->run() == FALSE){
            $data["title"] = "Edit Swashoppe Video Courses";
			$data["heding"] = "Edit Swashoppe Video Courses";
			$this->load->view('includes/header',$data);
			$data["supercategory"] = $this->db->get("swashoppe_category")->result_array();
			$data["edit_swashoppecategory"] = $this->swashoppecategory_model->edit($id);	
			$this->load->view('swashoppecategory/edit_swashoppe_category',$data);
			$this->load->view('includes/footer');
        }else{		
			if(empty($_FILES["category_banner"]["name"]))	{
				$filename  = $this->input->post("old_banner");	
			}else{
				$filename 	= rand(99999,9999)."_".$_FILES["category_banner"]["name"];            
				$this->do_upload($filename,'assets/swashoppe_category_banner','*');   
			}		
			$supercategory  = $this->input->post("supercategory"); 
			$blogcategory  = $this->input->post("category");
			$price     = $this->input->post("price");
			$data       =  array("category"=>$supercategory,"title"=>$blogcategory,'price'=>$price,'banner'=>$filename);

			$result 	=  $this->swashoppecategory_model->update($data,$id);
			if($result){
				$this->session->set_flashdata("success","Swashoppe Video Courses Update Successfully.");
				redirect("SwashoppeCategory");
			}else{
				$this->session->set_flashdata("fail","Swashoppe Video Courses Not Update Successfully..");
				redirect("SwashoppeCategory/edit");
			}    			
    	}
    }	

	public function do_upload($filename,$path,$type){
		
        $config['upload_path']          = $path;
        $config['allowed_types']        = $type;
        $config['file_name'] 			= $filename;
        $this->load->library('upload', $config);
	    if (!$this->upload->do_upload('category_banner')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);exit;            
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }
}