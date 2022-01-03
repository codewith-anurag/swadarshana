<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("service_model");
        $this->load->helper("ckeditor");
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
    }

    /**
     * Service List Page Load
     */
    public function index() {
        if ($this->session->userdata("id") == "") {
            redirect("login");
        }
        $data["title"] = "Services";
        $data["heding"] = "Services List";
        $this->load->view('includes/header', $data);
        $data["service"] = $this->service_model->get_service();
        $this->load->view('service/service_list', $data);
        $this->load->view('includes/footer');
    }

    /*
     * Add Popup Service
     */

    public function add_service() {
        if ($this->session->userdata("id") == "") {
            redirect("login");
        }
        $this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList',"font size")
        );
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '1510px';
        $this->ckeditor->config['height'] = '300px';
        //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor, '../asset/ckeditor/');
        $data["title"] = "Add Service";
        $data["heding"] = "Add Service";
        $this->load->view('includes/header', $data);
        $this->load->view('service/add_service');
        $this->load->view('includes/footer');
    }

    /*
     * Insert   Service
     */

    public function insert() {
        $this->form_validation->set_rules('title', 'Title', 'required');
        if (empty($_FILES["banner_image"]["name"])) {
            $this->form_validation->set_rules('banner_image', 'Service Banner Image', 'required');
        }
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Add Service";
            $data["heding"] = "Add Service";
            $this->load->view('includes/header', $data);
            $this->load->view('service/add_service');
            $this->load->view('includes/footer');
        } else {
            $ext = pathinfo($_FILES["banner_image"]["name"], PATHINFO_EXTENSION);
            $filename = rand(99999, 9999) . "_" ."_".$this->input->post("title").".".$ext;
            $banner_image = str_replace(" ","", $filename);
            $this->do_upload($banner_image, 'assets/servicebanner_image','banner_image' ,'*');
            
            $ext = pathinfo($_FILES["mobile_bannerimage"]["name"], PATHINFO_EXTENSION);
            $filename = rand(99999, 9999) . "_" ."mobile"."_".$this->input->post("title").".".$ext;
            $mobile_bannerimage = str_replace(" ","", $filename);
            $this->do_upload($mobile_bannerimage, 'assets/mobile_servicebannerimage','mobile_bannerimage' ,'*');

            $title = $this->input->post("title");
            $short_description = $this->input->post("short_description");
            $middle_description = $this->input->post("middle_description");
            $long_description = $this->input->post("long_description");

            $data = array("banner_image"=>$banner_image,"mobile_bannerimage"=>$mobile_bannerimage,"title" => $title, "short_description" => $short_description, "middle_description" => $middle_description, "long_description" => $long_description);
            $result = $this->service_model->insert($data);
            if ($result) {
                $this->session->set_flashdata("success", "Service  Add Successfully.");
                redirect("service");
            } else {
                $this->session->set_flashdata("fail", "Service  Not Add Successfully..");
                redirect("service/add_service");
            }
        }
    }

    public function delete($id) {
        $result = $this->service_model->delete($id);
        if ($result) {
            $this->session->set_flashdata("success", " Service  Delete Successfully.");
            redirect("service");
        } else {
            $this->session->set_flashdata("fail", " Service Not Delete Successfully.");
            redirect("service");
        }
    }

    /*
     * Edit Service 
     */

    public function edit($id) {
        if ($this->session->userdata("id") == "") {
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
        $data["title"] = "Edit  Service";
        $data["heding"] = "Edit  Service";
        $this->load->view('includes/header', $data);
        $data["edit_service"] = $this->service_model->edit($id);
        $this->load->view('service/edit_service', $data);
        $this->load->view('includes/footer');
    }

    /*
     * Update Service
     */

    public function update($id) {
        $banner_image= "";
        $this->form_validation->set_rules('title', 'Title', 'required');
       
        if ($this->form_validation->run() == FALSE) {
            $this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
            $this->ckeditor->config['toolbar'] = array(
                array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
            );
            $this->ckeditor->config['language'] = 'en';
            $this->ckeditor->config['width'] = '1510px';
            $this->ckeditor->config['height'] = '300px';
            //Add Ckfinder to Ckeditor
            $this->ckfinder->SetupCKEditor($this->ckeditor, '../asset/ckeditor/');
            $data["title"] = "Edit  Service";
            $data["heding"] = "Edit  Service";
            $this->load->view('includes/header', $data);
            $data["edit_service"] = $this->service_model->edit($id);
            $this->load->view('service/edit_service', $data);
            $this->load->view('includes/footer');
        } else {
            if (!empty($_FILES["banner_image"]["name"])) {  

                $ext = pathinfo($_FILES["banner_image"]["name"], PATHINFO_EXTENSION);
                $filename = rand(99999, 9999) . "_" ."_".$this->input->post("title").".".$ext;
                $banner_image = str_replace(" ","", $filename);
                $this->do_upload($banner_image, 'assets/servicebanner_image','banner_image' ,'*');
                
            }else{
                $banner_image = $this->input->post("old_banner_image");
            }
            if(!empty($_FILES["mobile_bannerimage"]["name"])){
                $ext = pathinfo($_FILES["mobile_bannerimage"]["name"], PATHINFO_EXTENSION);
                $filename = rand(99999, 9999) . "_" ."mobile"."_".$this->input->post("title").".".$ext;
                $mobile_bannerimage = str_replace(" ","", $filename);
                $this->do_upload($mobile_bannerimage, 'assets/mobile_servicebannerimage','mobile_bannerimage' ,'*');
            }else{
                $mobile_bannerimage = $this->input->post("old_mobile_bannerimage");
            }
            
            $title = $this->input->post("title");
            $short_description = $this->input->post("short_description");
            $middle_description = $this->input->post("middle_description");
            $long_description = $this->input->post("long_description");


            $data = array("banner_image"=>$banner_image,"mobile_bannerimage"=>$mobile_bannerimage,"title" => $title, "short_description" => $short_description, "middle_description" => $middle_description, "long_description" => $long_description);
            $result = $this->service_model->update($data, $id);
            if ($result) {
                $this->session->set_flashdata("success", " Service  Update Successfully.");
                redirect("service");
            } else {
                $this->session->set_flashdata("fail", " Service  Not Update Successfully..");
                redirect("service/edit");
            }
        }
    }

    public function do_upload($filename,$path,$control_name ,$type) {

        $config['upload_path'] = $path;
        $config['allowed_types'] = $type;
        $config['file_name'] = $filename;
        $config['remove_spaces'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($control_name)) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            exit;
        } else {
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);exit;          
        }
    }

}
