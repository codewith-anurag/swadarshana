<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popupservice_model extends CI_Model {
	/*
	 * Get Popup List
	*/
	public function get_popupservice(){
		$this->db->select("*");
		$this->db->from("popupservice_master")->order_by("id","desc");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Get Service
	*/
	public function get_service()
	{
		$this->db->select("*");
		$this->db->from("service_master");
		$query = $this->db->get();				
		return $query->result_array();
	}

	/*
	 * Insert Popup
	 *
	*/
	public function insert($data)
	{
		$sql = $this->db->insert("popupservice_master",$data);
		if($sql){
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Edit Popup
	 *
	*/
	public function edit($id)
	{
		$this->db->select("*");
		$this->db->from("popupservice_master")->where("id",$id);
		$query = $this->db->get();				
		return $query->row_array();
	}

	/*
	 * Update Popup
	*/
	public function update($data,$id)
	{
		$this->db->where("id",$id);
		$query = $this->db->update("popupservice_master",$data);
		//echo $this->db->last_query();exit;
		if ($query) {
			return true;
		}else{
			return fasle;
		}
	}

	/*
	 * Delete Popup
	 * 
	*/
	public function delete($id)
	{
		$this->db->where("id",$id);
		$sql = $this->db->delete("popupservice_master");
		if ($sql) {
			return true;
		}else{
			return  fasle;
		}
	}
}