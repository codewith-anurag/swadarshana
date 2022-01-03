<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {
	/*
	 * Get Review List
	*/
	public function get_review(){
		$this->db->select("*");
		$this->db->from("review_master")->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Review
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("review_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Slider
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("review_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Slider
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("review_master",$data);
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Review
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("review_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}