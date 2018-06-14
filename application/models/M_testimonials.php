<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Table name: clinics
 */

class M_testimonials extends CI_Model {

    public $table = "iptv_testimonials";

    function get_rows($limit = NULL, $start = 0) {
        if ($limit !== NULL) {
            $this->db->limit($limit, $start);
        }
        $this->db->order_by("testi_id DESC");
        
        return $this->db->get($this->table)->result_array();
        
    }

    function count_list($keywords = NULL) {

        return $this->db->get_where($this->table, array('status' => 'Enabled'))->num_rows();
    }

    function add_new($params) {
        $this->db->insert($this->table, $params);
        return $this->db->insert_id();
    }

    function update($id, $params) {
        $this->db->update($this->table, $params, array('testi_id' => $id));
        return $this->db->affected_rows();
    }

    function get_row($id) {
        return $this->db->get_where($this->table, array('testi_id' => $id))->row_array();
    }

    function delete($id) {
        $this->db->delete($this->table, array('testi_id' => $id));
        return $this->db->affected_rows();
    }

}
