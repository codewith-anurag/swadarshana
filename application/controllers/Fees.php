<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fees extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("fees_model");
    }

    /**
     * Reivew List Page Load
     */
    public function index() {
        if ($this->session->userdata("id") == "") {
            redirect("login");
        }
        $data["title"] = "FEES";
        $data["heding"] = "FEES";
        $this->load->view('includes/header', $data);
        $data["fees"] = $this->fees_model->get_fees();
        $this->load->view('fees/fees_list', $data);
        $this->load->view('includes/footer');
    }

    /*
     * Add Slider
     */

    public function add_fees() {
        if ($this->session->userdata("id") == "") {
            redirect("login");
        }
        $data["title"] = "Add FEES";
        $data["heding"] = "Add FEES";
        $this->load->view('includes/header', $data);
        $this->load->view('fees/add_fees');
        $this->load->view('includes/footer');
    }

    /*
     * Insert  Slider
     */

    public function insert() {
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Add FEES";
            $data["heding"] = "Add FEES";
            $this->load->view('includes/header', $data);
            $this->load->view('fees/add_fees');
            $this->load->view('includes/footer');
        } else {

            $description = $this->input->post("description");

            $data = array("description" => $description);
            $result = $this->fees_model->insert($data);
            if ($result) {
                $this->session->set_flashdata("success", "Fees  Add Successfully.");
                 redirect("fees");
            } else {
                $this->session->set_flashdata("fail", "Fees  Not Add Successfully..");
                redirect("fees/add_fees");
            }
        }
    }

    public function delete($id) {
        $result = $this->fees_model->delete($id);
        if ($result) {
            $this->session->set_flashdata("success", "FAQ  Delete Successfully.");
            redirect("fees");
        } else {
            $this->session->set_flashdata("fail", "FAQ Not Delete Successfully.");
            redirect("fees");
        }
    }

    /*
     * Edit Faq
     */

    public function edit($id) {
        if ($this->session->userdata("id") == "") {
            redirect("login");
        }
        $data["title"] = "Edit Fees";
        $data["heding"] = "Edit Fees";
        $this->load->view('includes/header', $data);
        $data["edit_fees"] = $this->fees_model->edit($id);
        $this->load->view('fees/edit_fees', $data);
        $this->load->view('includes/footer');
    }

    /*
     * Update Faq
     */

    public function update($id) {
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data["title"] = "Edit Fees";
            $data["heding"] = "Edit Fees";
            $this->load->view('includes/header', $data);
            $data["edit_fees"] = $this->fees_model->edit($id);
            $this->load->view('fees/edit_fees', $data);
            $this->load->view('includes/footer');
        } else {
            
            $description = $this->input->post("description");
            $data = array("description" => $description);
            $result = $this->fees_model->update($data, $id);
            if ($result) {
                $this->session->set_flashdata("success", "Fees  Update Successfully.");
                redirect("fees");
            } else {
                $this->session->set_flashdata("fail", "Fees  Not Update Successfully..");
                redirect("fees/edit");
            }
        }
    }

}
