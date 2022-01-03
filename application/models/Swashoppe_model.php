<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swashoppe_model extends CI_Model {

	/*
	 * Get Swashoppe Category
	*/
	public function get_swashoppecategory()
	{
		$this->db->select("*");
		$this->db->from("swashoppe_category")->order_by("id","asc");
		$query = $this->db->get();				
		return $query->result_array();
	}
	public function get_swashoppe_course_category()
	{
		$this->db->select("*");
		$this->db->from("swashoppe_course")->order_by("id","asc");
		$query = $this->db->get();				
		return $query->result_array();
	}


	/*
	 * Get Swashoppe List
	*/
	public function get_swashoppe(){
		$sql = "SELECT swashoppe_master.id as videoid,swashoppe_master.title,thumbnail_image,video,swashoppe_course.id as courseid,swashoppe_course.title as course_title FROM swashoppe_master,swashoppe_course WHERE swashoppe_master.course_id = swashoppe_course.id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/*
	 * Insert Swashoppe
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("swashoppe_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Swashoppe
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("swashoppe_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Swashoppe
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("swashoppe_master",$data);
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Swashoppe
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("swashoppe_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}
