<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Table name: events
 */

class M_plans extends CI_Model {

    public $table = "iptv_pricing_plans";

    function get_rows($keyword=NULL,$limit = NULL, $start = 0) {
        
        if ($limit !== NULL) {
            $this->db->limit($limit, $start);
        }
        if ($keyword !== NULL) {
            $this->db->like('plan_title', $keyword);
        }
        
        return $this->db->get($this->table)->result_array();
       
    }
    
    function count_list(){
        return $this->db->get($this->table)->num_rows();
    }

    function add_new($params) {
        $this->db->insert($this->table, $params);
        return $this->db->insert_id();
    }

    function update($plan_id, $params) {
        $this->db->update($this->table, $params, array('plan_id' => $plan_id));
        return $this->db->affected_rows();
    }

    function get_row($plan_id) {

        return $this->db->get_where($this->table, array('plan_id' => $plan_id))->row_array();
    }
    function delete($plan_id) {
        $this->db->delete($this->table, array('plan_id' => $plan_id));
        return $this->db->affected_rows();
    }

}
