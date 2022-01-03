<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Swashoppecategory_model extends CI_Model {
	/*
	 * Get Blog Category List
	*/
	public function get_albumcategory(){
		$sql = "select swashoppe_course.id as album_id,swashoppe_course.title as album_title,banner,price,swashoppe_category.* from swashoppe_course,swashoppe_category where swashoppe_course.category = swashoppe_category.id  order by swashoppe_course.id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/*
	 * Insert Blog Category
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("swashoppe_course",$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	/*
	 * Edit Blog Category
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("swashoppe_course")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Blog Category
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("swashoppe_course",$data);
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	/*
	 * Delete Blog Category
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("swashoppe_course");
		if ($sql) {
			return true;
		}else{
			return  false;
		}
	}
}