<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class About extends CI_Controller {

	function __construct() {

        parent::__construct();

        $this->load->model("front_model");

        $this->load->library("pagination");

    }



	/**

	 *

	 * Get Blog

	 */

	public function index()

	{

		$data["page_title"] = "About";

		$this->load->view('web/includes/header',$data);

		$config = array();

		if (!is_numeric($this->uri->segment(3))) {

			$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;

		}else{

			$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;

		}



        $total_records  = $this->front_model->get_blogcount();

        $limit_per_page = 10;

        if ($total_records > 0)

        {

            // get current page records

            $data["blog"] = $this->front_model->get_blog($limit_per_page, $page*$limit_per_page);

            $data["recentblog"] = $this->front_model->get_recentblog();

            $config["base_url"] = base_url() . "web/blog/index/";

            $config['total_rows'] = $total_records;

            $config["per_page"] = $limit_per_page;

            if (!is_numeric($this->uri->segment(3))) {

            	$config["uri_segment"] = 4;

             }else{

				$config["uri_segment"] = 3;

			}

            // custom paging configuration

            $config['num_links'] = 20;

            $config['use_page_numbers'] = TRUE;

            $config['reuse_query_string'] = TRUE;



            $config['full_tag_open'] = '<ul class="panigation-contain">';

            $config['full_tag_close'] = '</ul>';



            $config['first_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i><i class="fa fa-angle-left" aria-hidden="true"></i>';

            $config['first_tag_open'] = '<li><span class="link-page">';

            $config['first_tag_close'] = '</span></li>';



            $config['last_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i>';

            $config['last_tag_open'] = '<li><span class="link-page">';

            $config['last_tag_close'] = '</span></li>';



            $config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';

            $config['next_tag_open'] = '<li><span class="link-page next">';

            $config['next_tag_close'] = '</span></li>';



            $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';

            $config['prev_tag_open'] = '<li><span class="link-page">';

            $config['prev_tag_close'] = '</span></li>';



            $config['cur_tag_open'] = '<li><span class="current-page">';

            $config['cur_tag_close'] = '</span></li>';



            $config['num_tag_open'] = '<span class="numlink">';

            $config['num_tag_close'] = '</span>';



            $this->pagination->initialize($config);



            // build paging links

            $data["links"] = $this->pagination->create_links();

        }

        $this->pagination->initialize($config);

		$this->load->view('web/about',$data);

		$this->load->view('web/includes/footer');

	}





}
