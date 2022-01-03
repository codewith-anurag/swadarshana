<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fees extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("front_model");
        $this->load->library("pagination");
    }

    /**
     * 
     * Get Blog
     */
    public function index() {
        $data["page_title"] = "Fees";
        $this->load->view('web/includes/header', $data);
        $data["fees"]  = $this->front_model->get_fees();
        $this->load->view('web/fees', $data);
        $this->load->view('web/includes/footer');
    }  

}