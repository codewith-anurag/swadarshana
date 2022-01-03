<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {
	/*
	 * Get Service List
	*/
	public function get_service(){
		$this->db->select("*");
		$this->db->from("service_master")->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Service
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("service_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Service
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("service_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Service
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("service_master",$data);
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Service
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("service_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}