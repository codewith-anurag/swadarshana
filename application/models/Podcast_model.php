<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Podcast_model extends CI_Model {
	
	/*
	 * Get Podcast  List
	*/
	public function get_podcast(){
		$this->db->select("*");
		$this->db->from("podcast_master");		
		$this->db->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Podcast 
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("podcast_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Podcast 
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("podcast_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Podcast 
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("podcast_master",$data);
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Podcast 
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("podcast_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}