<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogcategory_model extends CI_Model {
	/*
	 * Get Blog Category List
	*/
	public function get_blogcategory(){
		$this->db->select("*");
		$this->db->from("blogcategory_master")->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Blog Category
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("blogcategory_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Blog Category
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("blogcategory_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Blog Category
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("blogcategory_master",$data);
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Blog Category
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("blogcategory_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}