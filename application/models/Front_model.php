<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model {
    /*
     * Get Slider List
     */

    public function get_slider() {
        $this->db->select("*");
        $this->db->from("slider_master")->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * Get Gallery List
     */

    public function get_gallery() {
        $this->db->select("*");
        $this->db->from("gallery_master")->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * Get Reviews List
     */

    public function get_reviews($limit, $start) {
        $this->db->select("*");
        $this->db->from("review_master")->limit($limit, $start)->order_by("index_order", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * Get Reviews Count
     */

    public function get_reviewscount() {
        return $this->db->count_all("review_master");
    }

    /*
     * Get Video Testimonial
     */

    public function get_videotestimonial($limit="", $start="") {
        $this->db->select("*");
        $this->db->from("videotestimonial_master")->order_by("index_order", "asc");
        //->limit($limit, $start)
        $query = $this->db->get();
        return $query->result_array();
    }

     /*
     * Search Video Testimonial
     */

    public function search_videotestimonial($category,$limit="", $start="") {
        if($category !=0){
            $this->db->select("*");
            $this->db->from("videotestimonial_master")->where("category",$category);
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->select("*");
            $this->db->from("videotestimonial_master")->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    /*
     * Get Reviews Count
     */

    public function get_videotestimonialcount() {
        return $this->db->count_all("videotestimonial_master");
    }

    /*     * ************************************************************ Get Services All Function ********************************************************************** */

    public function get_services_detail($service_title) {
        
        $this->db->select("*");
        $this->db->from("service_master");
        $this->db->where("title", $service_title);
        $ex = $this->db->get();
        
        return $ex->row_array();
    }

    /*
     * Get Sub Services
     */

    public function get_subservice($serviceID) {
        $this->db->select("*");
        $this->db->from("popupservice_master");
        $this->db->where("serviceid", $serviceID);
        $ex = $this->db->get();        
        return $ex->result_array();
    }

    /* Get Popup Services For Services Detail Page */

    public function get_popupservice_detail($popupservice_id) {
        $this->db->select("*");
        $this->db->from("popupservice_master");
        $this->db->where("id", $popupservice_id);
        $ex = $this->db->get();
        $result = $ex->row_array();
        //print_r($result);exit;
        return $result;
    }

    /*     * ******************************************************  Get Blog ****************************************************************** */
    /*
     * Get Blog List
     */

    public function get_blog($limit, $start) {
        $this->db->select("blog_master.id as blogid,image,title,description,authername,blog_master.category,today_date,blogcategory_master.id,blogcategory_master.category as blogcategory");
        $this->db->from("blog_master");
        $this->db->join("blogcategory_master", "blog_master.category = blogcategory_master.id");
        $this->db->limit($limit, $start)->order_by("blogid", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result_array();
    }

    /*
     * Get Blog Detail
     */

    public function blog_detail($Blog_ID) {
        $this->db->select("blog_master.id as blogid,image,title,description,authername,blog_master.category,today_date,blogcategory_master.id,blogcategory_master.category as blogcategory");
        $this->db->from("blog_master");
        $this->db->join("blogcategory_master", "blog_master.category = blogcategory_master.id");
        $this->db->where("blog_master.id", $Blog_ID);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->row_array();
    }

    /*
     * Get Recent Blog 
     */

    public function get_recentblog() {
        $this->db->select("blog_master.id as blogid,image,title,today_date");
        $this->db->from("blog_master");
        $this->db->limit(5);
        $this->db->order_by("today_date", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result_array();
    }

    /*
     * Search Blog List
     */

    public function search_blog($search) {
        $this->db->select("blog_master.id as blogid,image,title,description,authername,blog_master.category,today_date,blogcategory_master.id,blogcategory_master.category as blogcategory");
        $this->db->from("blog_master");
        $this->db->join("blogcategory_master", "blog_master.category = blogcategory_master.id");
        $this->db->like("blog_master.title", $search, 'before');
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result_array();
    }

    /*
     * Get Blog Count
     */

    public function get_blogcount() {
        return $this->db->count_all("blog_master");
    }

    /*     * *********************************************** Get Podcast ***************************************************************************** */
    /*
     * Get Podcast List
     */

    public function get_podcast($limit, $start) {
        $this->db->select("*");
        $this->db->from("podcast_master");
        $this->db->limit($limit, $start)->order_by("id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result_array();
    }

    /*
     * Get Podcast Detail
     */

    public function get_podcastdetail($id) {
        $this->db->select("*");
        $this->db->from("podcast_master");
        $this->db->where("id", $id);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->row_array();
    }

    /*
     * Get Blog Count
     */

    public function get_podcastcount() {
        return $this->db->count_all("podcast_master");
    }

    /*     * *********************************************** Get Event ***************************************************************************** */
    /*
     * Get Event List
     */

    public function get_event($limit, $start) {
        $this->db->select("*");
        $this->db->from("event_master");
        $this->db->limit($limit, $start)->order_by("id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result_array();
    }

    /*
     * Get Event Detail
     */

    public function get_eventdetail($id) {
        $this->db->select("*");
        $this->db->from("event_master");
        $this->db->where("id", $id);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->row_array();
    }

    /*
     * Get Event Count
     */

    public function get_eventcount() {
        return $this->db->count_all("event_master");
    }

    /*     * *********************************************** Get FAQ ************************************************************************** */
    /*
     * Get FAQ List
     */

    public function get_faq($limit, $start) {
        $this->db->select("*");
        $this->db->from("faq_master");
        $this->db->limit($limit, $start)->order_by("id", "desc");
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result_array();
    }

    /*
     * Get FAQ Count
     */

    public function get_faqcount() {
        return $this->db->count_all("faq_master");
    }

    /***************************************************** Get Swa Shoppe ***************************************************************************** */

        /**
         *  Get Swa Shoppe Category
         */
        public function get_swashoppe_category() {
            $this->db->select("*");
            $this->db->from("swashoppe_category")->order_by('id', 'asc');
            $query = $this->db->get();
            //echo $this->db->last_query();exit;
            return $query->result_array();
        }
        
        /*
         * Get Swa Shoppe Search
         */

        public function get_swashoppe_search($search) {
            $search = "'%".$search."%'";
             
            $sql = "SELECT swashoppe_course.id as course_id ,swashoppe_course.title as course_title,swashoppe_course.banner as coursebanner,swashoppe_course.price as course_price,swashoppe_course.category,COUNT(swashoppe_master.id) AS totalvideo FROM swashoppe_course,swashoppe_master WHERE swashoppe_course.title  LIKE ".$search ." and swashoppe_master.course_id = swashoppe_course.id GROUP BY swashoppe_master.course_id;";
            $query = $this->db->query($sql);
            
            return $query->result_array();
        }


        /*
         * Get Swa Shoppe Detail
         */

        public function get_swashoppedetail($id) {
            $this->db->select("*");
            $this->db->from("swashoppe_master");
            $this->db->where("course_id", $id);
            $query = $this->db->get();
            //echo $this->db->last_query();exit;
            return $query->row_array();
        }
    
     /***************************************************** Get Swa Shoppe ***************************************************************************** */
    /**
     *  Get Fees Detail
     */
    public function get_fees() {
        $this->db->select("*");
        $this->db->from("fees_master");
        $query = $this->db->get();        
        return $query->result_array();
    }
}
