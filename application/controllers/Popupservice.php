<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Popupservice extends CI_Controller {

	function __construct() {

        parent::__construct();
        $this->load->helper("ckeditor");
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');

        $this->load->model("popupservice_model");     


    }

	/**

	 * Reivew List Page Load

	 */

	public function index(){

		if (!$this->session->userdata("logged_in")) {

			redirect("login");

		}

		$data["title"] = "Popup Service";

		$data["heding"] = "Popup Service List";

		$this->load->view('includes/header',$data);

		$data["popupservice"] = $this->popupservice_model->get_popupservice();

		$this->load->view('popupservice/popupservice_list',$data);

		$this->load->view('includes/footer');

	}



	/*

	 * Add Popup Service

	*/

	public function add_popupservice(){

		if (!$this->session->userdata("logged_in")) {

			redirect("login");

		}

		$this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        );
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '1510px';
        $this->ckeditor->config['height'] = '300px';
        //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor, '../asset/ckeditor/');

		$data["title"] = "Add Popup Service";

		$data["heding"] = "Add Popup Service";

		$this->load->view('includes/header',$data);		

		$data["service"] = $this->popupservice_model->get_service();

		$this->load->view('popupservice/add_popupservice',$data);

		$this->load->view('includes/footer');

	}





	/*

	 * Insert  Popup Service

	*/

	public function insert()

	{	

		$this->form_validation->set_rules('service', 'Service', 'required');				

		$this->form_validation->set_rules('title', 'Title', 'required');

		if (empty($_FILES["serviceimage"]["name"])) {

			$this->form_validation->set_rules('serviceimage', 'Service Image', 'required');

		}

		$this->form_validation->set_rules('description', 'Service Description', 'required');

		

		if ($this->form_validation->run() == FALSE){
			$this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
        	$this->ckeditor->config['toolbar'] = array(
            	array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        	);
        	$this->ckeditor->config['language'] = 'en';
       		$this->ckeditor->config['width'] = '1510px';
        	$this->ckeditor->config['height'] = '300px';
        	//Add Ckfinder to Ckeditor
        	$this->ckfinder->SetupCKEditor($this->ckeditor, '../asset/ckeditor/');
           $data["title"] = "Add Popup Service";

			$data["heding"] = "Add Popup Service";

			$this->load->view('includes/header',$data);		

			$this->load->view('popupservice/add_popupservice');

			$this->load->view('includes/footer');

        }else{

           	$filename 	= rand(99999,9999)."_".str_replace( " ", "_",  preg_replace("/[^a-z0-9\_\-\.]/i", '',$_FILES["serviceimage"]["name"]));  

			$this->do_upload($filename,'serviceimage','assets/popupservice_image','*');         



			$service  	   = $this->input->post("service");

        	$title  	   = $this->input->post("title");

        	$description   = $this->input->post("description");
			$slug          = str_replace('_', '-', $title);
			$final_slugs    =  preg_replace('/[ -]+/', '_', $slug);
			$final_slug    =  preg_replace('/[ ,]+/', '_', $final_slugs);
        	



			$data       =  array("serviceid"=>$service,"title"=>$title,"slug"=>$final_slug,"serviceimage"=>$filename,"description"=>$description);

			$result 	=  $this->popupservice_model->insert($data);

			if($result){

				$this->session->set_flashdata("success","Popupservice  Add Successfully.");

				redirect("popupservice");

			}else{

				$this->session->set_flashdata("fail","Popupservice  Not Add Successfully..");

				redirect("popupservice/add_popupservice");

			}

    	}		

    }



    public function delete($id)

    {

   		$result = $this->popupservice_model->delete($id);

   		if ($result) {

   			$this->session->set_flashdata("success","Popup Service  Delete Successfully.");

			redirect("popupservice");

   		}else{

   			$this->session->set_flashdata("fail","Popup Service Not Delete Successfully.");

			redirect("popupservice");

   		}

    }



    /*

     * Edit Popupservice 

    */

	public function edit($id){

		if (!$this->session->userdata("logged_in")) {

			redirect("login");

		}
		$this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        );
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '1510px';
        $this->ckeditor->config['height'] = '300px';
        //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor, '../asset/ckeditor/');

		$data["title"] = "Edit Popup Service";

		$data["heding"] = "Edit Popup Service";

		$this->load->view('includes/header',$data);

		$data["service"] = $this->popupservice_model->get_service();

		$data["edit_popupservice"] = $this->popupservice_model->edit($id);		



		$this->load->view('popupservice/edit_popupservice',$data);

		$this->load->view('includes/footer');

	}	



	/*
	 * Update Popupservice
	*/
	public function update($id)
	{	

		$this->form_validation->set_rules('title', 'Title', 'required');					
		if ($this->form_validation->run() == FALSE){
			$this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
       		 $this->ckeditor->config['toolbar'] = array(
           		 array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        	);
        	$this->ckeditor->config['language'] = 'en';
        	$this->ckeditor->config['width'] = '1510px';
       		$this->ckeditor->config['height'] = '300px';
        	//Add Ckfinder to Ckeditor
        	$this->ckfinder->SetupCKEditor($this->ckeditor, '../asset/ckeditor/');
            $data["title"] = "Add Popup Service";
			$data["heding"] = "Add Popup Service";
			$this->load->view('includes/header',$data);		
			$this->load->view('popupservice/add_popupservice');
			$this->load->view('includes/footer');
        }else{			
        
			if(!empty($_FILES["serviceimage"]["name"]) && isset($_FILES["serviceimage"]["name"])){
				$filename 	= rand(99999,9999)."_".str_replace( " ", "_",  preg_replace("/[^a-z0-9\_\-\.]/i", '',$_FILES["serviceimage"]["name"]));  
				$this->do_upload($filename,'serviceimage','assets/popupservice_image','*');
			}else{
				$filename = $this->input->post("old_serviceimage");
			}			

			$service       = $this->input->post("service");
			$title  	   = $this->input->post("title");
			$slug          = str_replace('_', '-', $title);
			$final_slugs    =  preg_replace('/[ -]+/', '_', $slug);
			$final_slug    =  preg_replace('/[ ,]+/', '_', $final_slugs);
			$FinalSlug     =  preg_replace('/[ &]+/', '_', $final_slug);

        	$description   = $this->input->post("description");

			$data       =  array("serviceid"=>$service,"title"=>$title,"slug"=>$FinalSlug,"serviceimage"=>$filename,"description"=>$description);
			$result 	=  $this->popupservice_model->update($data,$id);			

			if($result){
				$this->session->set_flashdata("success","Popup Service  Update Successfully.");
				redirect("popupservice");
			}else{
				$this->session->set_flashdata("fail","Popup Service  Not Update Successfully..");
				redirect("popupservice/edit");
			}
		}
    }



	public function do_upload($filename,$control_name,$path,$type){

		

        $config['upload_path']          = $path;

        $config['allowed_types']        = $type;

        $config['file_name'] 			= $filename;

        $config['remove_spaces']        = FALSE;

        $this->load->library('upload', $config);

	    if (!$this->upload->do_upload($control_name)){

            $error = array('error' => $this->upload->display_errors());

            print_r($error);exit;            

        }else{

            $data = array('upload_data' => $this->upload->data());

            //print_r($data);exit;          

        }

    }

}