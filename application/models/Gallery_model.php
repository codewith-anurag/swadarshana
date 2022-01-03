<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {
	/*
	 * Get Gallery List
	*/
	public function get_gallery(){
		$this->db->select("*");
		$this->db->from("gallery_master")->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Gallery
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("gallery_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Gallery
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("gallery_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Gallery
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("gallery_master",$data);
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Gallery
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("gallery_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}
