<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {
	/*
	 * Get Blog Category
	*/
	public function get_blogcategory()
	{
		$this->db->select("*");
		$this->db->from("blogcategory_master")->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Get Blog  List
	*/
	public function get_blog(){
		$this->db->select("blog_master.*,blogcategory_master.category");
		$this->db->from("blog_master");
		$this->db->join('blogcategory_master', 'blog_master.category = blogcategory_master.id');
		$this->db->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Blog 
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("blog_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Blog 
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("blog_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Blog 
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("blog_master",$data);
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Blog 
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("blog_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}