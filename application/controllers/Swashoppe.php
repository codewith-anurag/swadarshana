<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Swashoppe extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model("swashoppe_model");
    }

    /**
     * Swa Shoppe List Page Load
     */
    public function index() {
        // if ($this->session->userdata("id") == "") {
        //     redirect("login");
        // }
        $data["title"] = "Swa Shoppe";
        $data["heding"] = "Swa Shoppe";
        $this->load->view('includes/header', $data);
        $data["swashoppe"] = $this->swashoppe_model->get_swashoppe();
        $this->load->view('swashoppe/swashoppe_list', $data);
        $this->load->view('includes/footer');
    }

    function get_album_category(){
        
        $albumcategory = $this->db->get("swashoppe_course")->result_array();
        echo json_encode($albumcategory);exit;
    }

    /*
     * Add Swa Shoppe
     */

    public function add_swashoppe() {
        // if ($this->session->userdata("id") == "") {
        //     redirect("login");
        // }
        $data["title"] = "Add Swa Shoppe";
        $data["heding"] = "Add Swa Shoppe";
        $this->load->view('includes/header', $data);
        $data["category"] = $this->swashoppe_model->get_swashoppecategory();
        $data["course_category"] = $this->swashoppe_model->get_swashoppe_course_category();
        $this->load->view('swashoppe/add_swashoppe', $data);
        $this->load->view('includes/footer');
    }

    /*
     * Insert  Swa Shoppe
     */

    public function insert() {
        $this->form_validation->set_rules("course", "Swa Shoppe Course", "required");
        $this->form_validation->set_rules("title", "Swa Shoppe Video Title", "required");
        
                
        if (!empty($_FILES["swashoppe_thumbnail"]["name"]) && !isset($_FILES["swashoppe_thumbnail"]["name"])) {
            $this->form_validation->set_rules("swashoppe_thumbnail", "Swa Shoppe Video Thumbnail", "required");
        }
        if (!empty($_FILES["video"]["name"]) && !isset($_FILES["video"]["name"])) {
            $this->form_validation->set_rules("video", "Swa Shoppe Video", "required");
        }
        
        $this->form_validation->set_rules("description", "Swa Shoppe Description ", "required");
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Add Swa Shoppe";
            $data["heding"] = "Add Swa Shoppe";
            $this->load->view('includes/header', $data);
            $this->load->view('swashoppe/add_swashoppe');
            $this->load->view('includes/footer');
        } else {

            // Get image file extension
            $allowed_image_extension = array("png", "jpg", "jpeg");
            $imagefile_extension = pathinfo($_FILES["swashoppe_thumbnail"]["name"], PATHINFO_EXTENSION);
            $allowed_video_extension = array("mp4", "avi", "mpg", "mpeg", "wmv", "mkv", "mov");
            $videofile_extension = pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);

            if (!in_array($imagefile_extension, $allowed_image_extension)) {
                $this->session->set_flashdata("fail", "Upload valiid Image File. Only PNG - JPG and JPEG are allowed.");
                redirect("swashoppe/add_swashoppe");
            } else if (!in_array($videofile_extension, $allowed_video_extension)) {
                $this->session->set_flashdata("fail", "Upload valiid Video File. Only MP4 OR AVI OR MPG OR WMV OR MKV OR MOV are allowed.");
                redirect("swashoppe/add_swashoppe");
            } else {

                $swashoppe_thumbnail = rand(99999, 9999) . "_" . $_FILES["swashoppe_thumbnail"]["name"];
                $this->do_upload($swashoppe_thumbnail, "swashoppe_thumbnail", 'assets/swashoppe_thumbnail', '*');

                $swashoppe_video = rand(99999, 9999) . "_" . $_FILES["video"]["name"];
                $temp_video = $_FILES["video"]["tmp_name"];
                move_uploaded_file($temp_video, "assets/swashoppe_video/" . $swashoppe_video);

               


                $title = $this->input->post("title");
                $course = $this->input->post("course");
                $course_text  = $this->input->post("course_text");
                $description = $this->input->post("description");                
                $publish_date = date("Y-m-d");

                $data = array("course_id" => $course,"title" => $title, "thumbnail_image" => $swashoppe_thumbnail, "video" => $swashoppe_video, "description" => $description, "publish_date" => $publish_date);
                $result = $this->swashoppe_model->insert($data);
                if ($result) {
                    $this->session->set_flashdata("success", "Swa Shoppe Video  Add Successfully.");
                    redirect("swashoppe");
                } else {
                    $this->session->set_flashdata("fail", "Swa Shoppe Video Not Add Successfully..");
                    redirect("swashoppe/add_swashoppe");
                }
            }
        }
    }

    /*
     * Edit Swa Shoppe
     */

    public function edit($id) {
        // if ($this->session->userdata("id") == "") {
        //     redirect("login");
        // }
        $data["title"] = "Edit Swa Shoppe";
        $data["heding"] = "Edit Swa Shoppe";
        $this->load->view('includes/header', $data);
        $data["category"] = $this->swashoppe_model->get_swashoppecategory();
        $data["course_category"] = $this->swashoppe_model->get_swashoppe_course_category();
        $data["editswashoppe"] = $this->swashoppe_model->edit($id);
        
        $this->load->view('swashoppe/edit_swashoppe', $data);
        $this->load->view('includes/footer');
    }

    /*
     * Update Slider
     */

    public function update($id) {
        $this->form_validation->set_rules("course", "Swa Shoppe Course", "required");        
        $this->form_validation->set_rules("title", "Swa Shoppe Video Title", "required");                      
        $this->form_validation->set_rules("description", "Swa Shoppe Description ", "required");
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Edit Swa Shoppe";
            $data["heding"] = "Edit Swa Shoppe";
            $this->load->view('includes/header', $data);
            $data["category"] = $this->swashoppe_model->get_swashoppecategory();
            $data["editswashoppe"] = $this->swashoppe_model->edit($id);
            $this->load->view('swashoppe/edit_swashoppe', $data);
            $this->load->view('includes/footer');
        } else {
            // Get image file extension
            if (!empty($_FILES["swashoppe_thumbnail"]) && ($_FILES["swashoppe_thumbnail"]["name"] != "")) {
                $allowed_image_extension = array("png", "jpg", "jpeg");
                $imagefile_extension = pathinfo($_FILES["swashoppe_thumbnail"]["name"], PATHINFO_EXTENSION);
                if (!in_array($imagefile_extension, $allowed_image_extension)) {
                    $this->session->set_flashdata("fail", "Upload valiid Image File. Only PNG - JPG and JPEG are allowed.");
                    redirect("swashoppe/edit/" . $id);
                }
            }
            if (!empty($_FILES["video"]) && ($_FILES["video"]["name"] != "")) {
                $allowed_video_extension = array("mp4", "avi", "mpg", "mpeg", "wmv", "mkv", "mov");
                $videofile_extension = pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION);
                if (!in_array($videofile_extension, $allowed_video_extension)) {
                    $this->session->set_flashdata("fail", "Upload valiid Video File. Only MP4 OR AVI OR MPG OR WMV OR MKV OR MOV are allowed.");
                    redirect("swashoppe/edit/" . $id);
                }
            }
            if (!empty($_FILES["swashoppe_thumbnail"]["name"]) && isset($_FILES["swashoppe_thumbnail"]["name"])) {
                $swashoppe_thumbnail = rand(99999, 9999) . "_" . $_FILES["swashoppe_thumbnail"]["name"];
                $this->do_upload($swashoppe_thumbnail, "swashoppe_thumbnail", 'assets/swashoppe_thumbnail', '*');
            } else {
                $swashoppe_thumbnail = $this->input->post("old_swashoppe_thumbnail");
            }
            if (!empty($_FILES["video"]["name"]) && isset($_FILES["video"]["name"])) {
                $swashoppe_video = rand(99999, 9999) . "_" . $_FILES["video"]["name"];
                $temp_video = $_FILES["video"]["tmp_name"];
                move_uploaded_file($temp_video, "assets/swashoppe_video/" . $swashoppe_video);
            } else {
                $swashoppe_video = $this->input->post("old_video");
            }
            $course = $this->input->post("course");
            $title = $this->input->post("title");            
            $description = $this->input->post("description");
            $publish_date = date("Y-m-d");

            $data = array("course_id" =>$course,"title" => $title, "thumbnail_image" => $swashoppe_thumbnail, "video" => $swashoppe_video, "description" => $description, "publish_date" => $publish_date);
            $result = $this->swashoppe_model->update($data, $id);
            if ($result) {
                $this->session->set_flashdata("success", "Swa Shoppe Update Successfully.");
                redirect("swashoppe");
            } else {
                $this->session->set_flashdata("fail", "Swa Shoppe Not Update Successfully..");
                redirect("swashoppe/edit");
            }
        }
    }

    /*
     * Delete Video Testimonial 
     */

    public function delete($id) {
        $result = $this->swashoppe_model->delete($id);
        if ($result) {
            $this->session->set_flashdata("success", "Swa Shoppe   Delete Successfully.");
            redirect("swashoppe");
        } else {
            $this->session->set_flashdata("fail", "Swa Shoppe  Not Delete Successfully.");
            redirect("swashoppe");
        }
    }

    public function do_upload($filename, $control_name, $path, $type) {
        $config['upload_path'] = $path;
        $config['allowed_types'] = $type;
        $config['file_name'] = $filename;
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
