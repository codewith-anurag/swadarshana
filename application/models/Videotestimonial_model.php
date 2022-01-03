<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videotestimonial_model extends CI_Model {
	/*
	 * Get Video Testimonial List
	*/
	public function get_videotestimonial(){
		$this->db->select("*");
		$this->db->from("videotestimonial_master")->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Video Testimonial
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("videotestimonial_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Video Testimonial
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("videotestimonial_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Video Testimonial
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("videotestimonial_master",$data);
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Slider
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("videotestimonial_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}
