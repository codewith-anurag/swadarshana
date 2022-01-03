<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fees_model extends CI_Model {
    /*
     * Get Fees List
     */

    public function get_fees() {
        $this->db->select("*");
        $this->db->from("fees_master")->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * Insert Fees
     *
     */

    public function insert($data) {
        $sql = $this->db->insert("fees_master", $data);
        if ($sql) {
            return true;
        } else {
            return fasle;
        }
    }

    /*
     * Edit Fees
     *
     */

    public function edit($id) {
        $this->db->select("*");
        $this->db->from("fees_master")->where("id", $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    /*
     * Update Fees
     */

    public function update($data, $id) {
        $this->db->where("id", $id);
        $query = $this->db->update("fees_master", $data);
        if ($query) {
            return true;
        } else {
            return fasle;
        }
    }

    /*
     * Delete Fees
     * 
     */

    public function delete($id) {
        $this->db->where("id", $id);
        $sql = $this->db->delete("fees_master");
        if ($sql) {
            return true;
        } else {
            return fasle;
        }
    }

}
