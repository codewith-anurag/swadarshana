<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_videos extends CI_Controller {
	function __construct() {
parent::__construct();
$this->load->model("front_model");
}
	/**
	*
	* Ge User Videos
	*/
	public function get_uservideos()
	{
		
		if ($this->session->userdata("id")=="") {
			redirect(base_url('web/swashoppe'));
		}
		$user_id = $this->session->userdata("id");
		
		$data["page_title"] = "Your Videos";
		$this->load->view('web/includes/header',$data);
		$user_detail  = $this->db->query("select * from customer where id = '$user_id'")->row();
		$data['user_detail']    =  $user_detail;
		$user_total_video     = $this->db->query("select count('video_id') as total_video from video_purchase_details where user_id=".$this->session->userdata("id"))->row();
		$data['total_video']  =  $user_total_video->total_video;
		
		$user_videoslist = $this->db->query("select swashoppe_master.*,video_purchase_details.user_id FROM swashoppe_master join video_purchase_details on swashoppe_master.id = video_purchase_details.video_id where user_id='$user_id'")->result_array();
		// echo $this->db->last_query();
		$data['videoresult'] = $user_videoslist;
		$data['transactionDetails'] = $this->db->query("select * from video_transaction where user_id = '$user_id' order by id desc")->result_array();
		 // echo $this->db->last_query();
		$this->load->view('web/user_videoslist',$data);
		$this->load->view('web/includes/footer');
	}
	/*
	* Watch User Purchase Videos
	*/
	public function watch_uservideos($Video_ID)
	{
		if ($this->session->userdata("id")=="") {
			redirect(base_url('web/swashoppe'));
		}
		$data["page_title"] = "Your Videos";
				$this->load->view('web/includes/header',$data);
		$user_videoslist = $this->db->query("select * from swashoppe_master where id='$Video_ID'")->row_array();
		$data['videoresult'] = $user_videoslist;
		$this->load->view('web/user_video_watch',$data);
		$this->load->view('web/includes/footer');
	}
	public function get_video_single()
	{
		
		$video_id = isset($_POST['video_id']) ? $_POST['video_id'] : "";
					$user_videoslist = $this->db->query("select * from swashoppe_master where id='$video_id'")->row();
				echo json_encode($user_videoslist);exit;
	}
	public function track_user_video()
	{
		$user_id    	= $this->session->userdata("id");
		$video_id   	= $this->input->post('video_id');
		$total_duration = $this->input->post("total_duration");
		
		
		$check_video = $this->db->query("select * FROM  video_tracking  where user_id='$user_id' and video_id='$video_id'  order by id DESC LIMIT 1 ")->num_rows();
		$get_video = $this->db->query("select * FROM  video_tracking  where user_id='$user_id' and video_id='$video_id'  order by id DESC LIMIT 1")->row();
		//echo $this->db->last_query();
		//print_r($get_video);
		//echo $get_video->pause_time;
		if($get_video->pause_time > 0 ){
			$start_times = $get_video->pause_time;
			$last_start_time = $get_video->strat_time;
			$pause_time  = $this->input->post('pausetime');
			$watching_duration = $pause_time -   $last_start_time;

			$udaptedata = array("user_id"=>$user_id,"video_id"=>$video_id,"strat_time"=>$start_times,"total_duration"=>$total_duration,"pause_time"=>$pause_time,"watching_duration"=>$watching_duration);
			//echo $this->db->last_query();exit;
			$this->db->insert("video_tracking",$udaptedata);
		}else{
			$start_time = 0;
			$pause_time  = $this->input->post('pausetime');
			$udaptedata = array("user_id"=>$user_id,"video_id"=>$video_id,"strat_time"=>$start_time,"total_duration"=>$total_duration,"pause_time"=>$pause_time);
			$this->db->insert("video_tracking",$udaptedata);
		}
	}
	
	public function get_current_time()
	{
		$user_id    = $this->session->userdata("id");
		$video_id   = $this->input->post('video_id');
		$get_video = $this->db->query("select * FROM  video_tracking  where user_id='$user_id' and video_id='$video_id'  order by id DESC LIMIT 1")->row();
		echo json_encode($get_video);
	}

	public function changePassword(){
		$post = $this->input->post();
		if($post['oldPassword']!=''){
			if($post['newPassword'] != ''){
				$getData = $this->db->get_where('customer',array('id'=>$post['user_id']))->row_array();
				if($getData){
					if(md5($post['oldPassword']) == $getData['password']){
						$updateData = array(
							'password' => md5($post['newPassword']),
						);
						$this->db->where('id',$post['user_id']);
						$update = $this->db->update('customer',$updateData);
						if($update){
							$this->session->set_flashdata("success_message","Password has been changed.");
						}else{
							$this->session->set_flashdata("error_message","oops! something want wrong!");
						}
					}else{
						$this->session->set_flashdata("error_message","old password not same.");
					}
				}else{
					$this->session->set_flashdata("error_message","User not found.");
				}
			}else{
			     $this->session->set_flashdata("error_message","please provide new password.");
			}
		}else{
	        $this->session->set_flashdata("error_message","please provide old password.");
		}
		redirect(base_url('web/user_videos/get_uservideos'));
	}
  public function logout()
	{
		$this->session->sess_destroy();
		echo "1";exit;
	}
}