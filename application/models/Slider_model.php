<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {
	/*
	 * Get Slider List
	*/
	public function get_slider(){
		$this->db->select("*");
		$this->db->from("slider_master")->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Slider
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("slider_master",$data);
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
		$this->db->from("slider_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Slider
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("slider_master",$data);
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
		$sql = $this->db->delete("slider_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}
