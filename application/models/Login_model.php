<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	/*
	 * Check User For Login Validate OR Not
	*/
	public function login($email,$password){
		
		$this->db->select("id,firstname,lastname,email,password");
		$this->db->from("user_master");
		$this->db->where("email",$email);
		$this->db->where("password",$password);
		$query = $this->db->get();		
		$no    = $query->num_rows();
		if($no == 1){
			$result = $query->row_array();									
			return $result;
		}else{
			return false;
		}
	}	

	/* Get Count Slider*/
	public function get_countslider()
	{
	 	$this->db->select("count('id') as total_slider");
	 	$this->db->from("slider_master");
	 	$ex     = $this->db->get();
	 	$result = $ex->row_array();
	 	return $result["total_slider"];
	}

	/* Get Count Service*/
	public function get_countservice()
	{
	 	$this->db->select("count('id') as total_service");
	 	$this->db->from("service_master");
	 	$ex     = $this->db->get();
	 	$result = $ex->row_array();
	 	return $result["total_service"];
	}

	/* Get Count Popup Service*/
	public function get_countpopupservice()
	{
		$this->db->select("count('id') as total_popupservice");
	 	$this->db->from("popupservice_master");
	 	$ex     = $this->db->get();
	 	$result = $ex->row_array();
	 	return $result["total_popupservice"];
	}

	/* Get Count review*/
	public function get_countreview()
	{
		$this->db->select("count('id') as total_review");
	 	$this->db->from("review_master");
	 	$ex     = $this->db->get();
	 	$result = $ex->row_array();
	 	return $result["total_review"];
	}

	/* Get Count FAQ*/
	public function get_countfaq()
	{
		$this->db->select("count('id') as total_faq");
	 	$this->db->from("faq_master");
	 	$ex     = $this->db->get();
	 	$result = $ex->row_array();
	 	return $result["total_faq"];
	}
	
	/* Get Count Fees*/
	public function get_countfees()
	{
		$this->db->select("count('id') as total_fees");
	 	$this->db->from("fees_master");
	 	$ex     = $this->db->get();
	 	$result = $ex->row_array();
	 	return $result["total_fees"];
	}
}
