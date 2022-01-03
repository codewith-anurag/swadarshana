<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class User_trackingvideos extends CI_Controller {

	function __construct() {

        parent::__construct();
    }

	/**

	 * User Videos  List Page Load

	 */

	public function index(){

		if ($this->session->userdata("id") == "") {

			redirect("login");

		}

		$data["title"] = "User Videos";

		$data["heding"] = "User Videos";

		$this->load->view('includes/header',$data);

		$cutmer_data = $this->db->query(" select customer.id,full_name,swashoppe_master.id as swashoppe_videoid,title,thumbnail_image,video,video_tracking.id as video_tracking_id,user_id,video_id,total_duration,strat_time,pause_time,ROUND(SUM(`watching_duration`), 2) as total_watching_time,MAX(video_tracking.pause_time) from customer join video_tracking on customer.id = video_tracking.user_id join swashoppe_master on video_tracking.video_id = swashoppe_master.id WHERE video_tracking.strat_time!=0 AND video_tracking.pause_time!=0 GROUP BY video_tracking.user_id HAVING MAX(video_tracking.pause_time) order by MAX(video_tracking.pause_time) DESC")->result_array();
		//select customer.id,full_name,swashoppe_master.id as swashoppe_videoid,title,thumbnail_image,video,video_tracking.id as video_tracking_id,user_id,video_id,total_duration,strat_time,pause_time,watching_duration from customer join video_tracking on customer.id = video_tracking.user_id join swashoppe_master on video_tracking.video_id = swashoppe_master.id where video_tracking.pause_time !=0 and video_tracking.strat_time !=0  GROUP BY video_tracking.user_id order by video_tracking.id DESC

		$data["user_videos"] =$cutmer_data;

		$this->load->view('user_trackingvideos/user_trackingvideos_list',$data);

		$this->load->view('includes/footer');

	}



	/*

	 * Video Tracking Detail
    */
	

	public function get_user_video_tracking_detail($User_ID=""){

		if ($this->session->userdata("id") == "") {

			redirect("login");

		}

		$data["title"] = "Video Tracking Detail";

		$data["heding"] = "Video Tracking Detail";

		$this->load->view('includes/header',$data);

		$user_video = $this->db->query("select customer.id,full_name,swashoppe_master.id as swashoppe_videoid,title,thumbnail_image,video,video_tracking.id as video_tracking_id,user_id,video_id,total_duration, strat_time,pause_time,watching_duration from customer join video_tracking on customer.id = video_tracking.user_id join swashoppe_master on video_tracking.video_id = swashoppe_master.id where user_id='$User_ID' order by video_tracking.id desc")->result_array();
		//echo $this->db->last_query();exit;

		$data["tracking_detail"] = $user_video;
		// echo "<pre>";
     	$this->load->view('user_trackingvideos/user_trackingvideos_detail',$data);
		$this->load->view('includes/footer');

	}

}
?>