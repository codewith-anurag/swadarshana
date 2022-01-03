<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("front_model");   
        $this->load->library("pagination");     
    }

	/**
	 * 
	 * Get Review
	 */
	public function index()
	{
        $data["page_title"] = "Reviews";
		$this->load->view('web/includes/header',$data);	
		$config = array();
		if (!is_numeric($this->uri->segment(3))) {
			$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
		}else{
			$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		}
        
        $total_records  = $this->front_model->get_reviewscount();      
        $limit_per_page = 4;
        if ($total_records > 0)
        {
            // get current page records
            $data["reviews"] = $this->front_model->get_reviews($limit_per_page, $page*$limit_per_page);	
                 
            $config["base_url"] = base_url() . "web/reviews/index/";
            $config['total_rows'] = $total_records;
            $config["per_page"] = $limit_per_page;
            if (!is_numeric($this->uri->segment(3))) {
            	$config["uri_segment"] = 4;
             }else{
				$config["uri_segment"] = 3;
			}
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['first_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i><i class="fa fa-angle-left" aria-hidden="true"></i>';
            $config['first_tag_open'] = '<li><span class="link-page">';
            $config['first_tag_close'] = '</span></li>';
             
            $config['last_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i>';
            $config['last_tag_open'] = '<li><span class="link-page">';
            $config['last_tag_close'] = '</span></li>';

            $config['num_tag_open'] = '<li>'; 
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><span class="current-page">'; 
            $config['cur_tag_close'] = '</span></li>'; 
            $config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>'; 
            $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>'; 
            $config['next_tag_open'] = '<li><span class="link-page next">'; 
            $config['next_tag_close'] = '</span></li>'; 
            $config['prev_tag_open'] = '<li><span class="link-page">'; 
            $config['prev_tag_close'] = '</span></li>'; 
            $config['first_tag_open'] = '<li><span class="link-page">'; 
            $config['first_tag_close'] = '</span></li>'; 
            $config['last_tag_open'] = '<li><span class="link-page">'; 
            $config['last_tag_close'] = '</span></li>';

            
            $this->pagination->initialize($config);
                 
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        $this->pagination->initialize($config);        
		$this->load->view('web/reviews',$data);
		$this->load->view('web/includes/footer');
	}

	/**
	 * 
	 * Get Video Testimonials
	 */
	public function videotestimonial()
	{
        $data["page_title"] = "Video Testimonials";
		$this->load->view('web/includes/header',$data);		
		$config = array();
		if (!is_numeric($this->uri->segment(3))) {
			$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
		}else{
			$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		}
        
        $total_records  = $this->front_model->get_videotestimonialcount();      
        $limit_per_page = 8;
        if ($total_records > 0)
        {
            // get current page records
           // $data["videotestimonial"] = $this->front_model->get_videotestimonial($limit_per_page, $page*$limit_per_page);	
            $data["videotestimonial"] = $this->front_model->get_videotestimonial();
                 
            $config["base_url"] = base_url() . "web/reviews/videotestimonial/";
            $config['total_rows'] = $total_records;
            $config["per_page"] = $limit_per_page;
            if (!is_numeric($this->uri->segment(3))) {
            	$config["uri_segment"] = 4;
             }else{
				$config["uri_segment"] = 3;
			}
             // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;

            $config['first_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i><i class="fa fa-angle-left" aria-hidden="true"></i>';
            $config['first_tag_open'] = '<li><span class="link-page">';
            $config['first_tag_close'] = '</span></li>';
             
            $config['last_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i>';
            $config['last_tag_open'] = '<li><span class="link-page">';
            $config['last_tag_close'] = '</span></li>';

            $config['num_tag_open'] = '<li>'; 
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><span class="current-page">'; 
            $config['cur_tag_close'] = '</span></li>'; 
            $config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>'; 
            $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>'; 
            $config['next_tag_open'] = '<li><span class="link-page next">'; 
            $config['next_tag_close'] = '</span></li>'; 
            $config['prev_tag_open'] = '<li><span class="link-page">'; 
            $config['prev_tag_close'] = '</span></li>'; 
            $config['first_tag_open'] = '<li><span class="link-page">'; 
            $config['first_tag_close'] = '</span></li>'; 
            $config['last_tag_open'] = '<li><span class="link-page">'; 
            $config['last_tag_close'] = '</span></li>';

             
            $this->pagination->initialize($config);
                 
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }

        $this->pagination->initialize($config);       
        $category = $this->db->get("videotestimonial_category_master")->result();
        $data["category"] = $category;
		$this->load->view('web/video_testimonials',$data);
		$this->load->view('web/includes/footer',$data);
	}

    /**
     * 
     * Search Video Testimonials
     */
    public function search_videotestimonial()
    {
        $ser_category = $this->input->get("category");
        $data["page_title"] = "Video Testimonials";
        $this->load->view('web/includes/header',$data);                     
        $category = $this->db->get("videotestimonial_category_master")->result();
        $data["category"] = $category;
        if($ser_category == 0){
            $config = array();
            if (!is_numeric($this->uri->segment(3))) {
                $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
            }else{
                $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
            }
        
            $total_records  = $this->front_model->get_videotestimonialcount();
            $limit_per_page = 8;
            if ($total_records > 0)
            {
                // get current page records
                $data["videotestimonial"] = $this->front_model->search_videotestimonial($ser_category,$limit_per_page, $page*$limit_per_page); 
                     
                $config["base_url"] = base_url() . "web/reviews/search_videotestimonial/";
                $config['total_rows'] = $total_records;
                $config["per_page"] = $limit_per_page;
                if (!is_numeric($this->uri->segment(3))) {
                    $config["uri_segment"] = 4;
                 }else{
                    $config["uri_segment"] = 3;
                }
                 // custom paging configuration
                $config['num_links'] = 2;
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;

                $config['first_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i><i class="fa fa-angle-left" aria-hidden="true"></i>';
                $config['first_tag_open'] = '<li><span class="link-page">';
                $config['first_tag_close'] = '</span></li>';
                 
                $config['last_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i>';
                $config['last_tag_open'] = '<li><span class="link-page">';
                $config['last_tag_close'] = '</span></li>';

                $config['num_tag_open'] = '<li>'; 
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li><span class="current-page">'; 
                $config['cur_tag_close'] = '</span></li>'; 
                $config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>'; 
                $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>'; 
                $config['next_tag_open'] = '<li><span class="link-page next">'; 
                $config['next_tag_close'] = '</span></li>'; 
                $config['prev_tag_open'] = '<li><span class="link-page">'; 
                $config['prev_tag_close'] = '</span></li>'; 
                $config['first_tag_open'] = '<li><span class="link-page">'; 
                $config['first_tag_close'] = '</span></li>'; 
                $config['last_tag_open'] = '<li><span class="link-page">'; 
                $config['last_tag_close'] = '</span></li>';

                 
                $this->pagination->initialize($config);
                     
                // build paging links
                $data["links"] = $this->pagination->create_links();
            }

                $this->pagination->initialize($config);    
        }else{
            $data["videotestimonial"] = $this->front_model->search_videotestimonial($ser_category);   
        }
        $this->load->view('web/search_videotestimonial',$data);
        $this->load->view('web/includes/footer',$data);
    }
}
