<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Table name: users
 */

class M_users extends CI_Model {

    public $table = "iptv_users";

    function login($email, $password) {
        
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $this->db->where('status', 'Enabled');
        $result = $this->db->get($this->table);
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    function register_user($params) {
        
        $this->db->insert($this->table, $params);
        return $this->db->insert_id();
        
    }

    function get_user($user_id) {
        
       $this->db->select("im_users_info.*,$this->table.*");
       $this->db->join("im_users_info", "im_users_info.user_id = $this->table.user_id", "INNER");
       return  $this->db->get_where($this->table, array("$this->table.user_id" => $user_id))->row_array();
        
    }
    
    function get_user2($user_id) {
        
       //$this->db->select("im_users_info.*,$this->table.*");
       //$this->db->join("im_users_info", "im_users_info.user_id = $this->table.user_id", "INNER");
       return  $this->db->get_where($this->table, array("$this->table.user_id" => $user_id))->row_array();
        
    }
    
    function get_applicant($user_id) {
        
        $this->db->select("im_users_info.*,$this->table.*");
        $this->db->join("im_users_info", "im_users_info.user_id = $this->table.user_id", "INNER");
        return $this->db->get_where($this->table, array("$this->table.user_id" => $user_id))->row_array();
        
    }

    function get_users($limit = NULL, $start = 0) {
        
        if ($limit !== NULL) {
            $this->db->limit($limit, $start);
        }
        
        $this->db->order_by("user_id DESC");
        $this->db->select("im_users_info.*,$this->table.*");
        $this->db->join("im_users_info", "im_users_info.user_id = $this->table.user_id", "INNER");
        return $this->db->get_where($this->table, array("$this->table.user_type" => 'User'))->result_array();
    }

    function get_user_by_email($email) {
        
        return $this->db->get_where($this->table, array('email' => $email, 'archived' => 'No'))->row_array();
        
    }
    
    function verification_link($user_id, $token) {
        return $this->db->get_where($this->table, array('md5(user_id)' => $user_id, 'token' => $token))->row_array();
    }
    
    function delete_user($user_id) {
        
        $this->db->delete($this->table, array('user_id' => $user_id));
        //$this->db->delete('im_users_info', array('user_id' => $user_id));
        return $this->db->affected_rows();
        
    }
    
    function delete_other_info($user_id) {
        
        $this->db->delete('im_users_info', array('user_id' => $user_id));
        return $this->db->affected_rows();
        
    }
     
    function update($params, $user_id) {
        
        $this->db->update($this->table, $params, array('user_id' => $user_id));
        return $this->db->affected_rows();
        
    }

    function change_password($params) {
        
        $userInfo = $this->session->userdata('userInfo');
        $where = array('user_id' => $userInfo['user_id'], 'password' => md5($params['password']));
        
        $this->db->update($this->table, array('password' => md5($params['new_password'])), $where);
        return $this->db->affected_rows();
        
    }

    function get_appicants_detail() {

        //$this->db->order_by("id DESC");
        $this->db->where("im_job_apply_detail.archived", 'No');
        $this->db->join("im_users", "im_users.user_id = im_job_apply_detail.applicant_id", "LEFT");
        $this->db->join("im_users_info", "im_users_info.user_id = im_job_apply_detail.applicant_id", "LEFT");
        $this->db->join("im_jobs", "im_jobs.job_id = im_job_apply_detail.job_id", "LEFT");
        return $this->db->get('im_job_apply_detail')->result_array();
    }

    function add_contact($params) {

        $this->db->insert('iptv_contact', $params);
        return $this->db->insert_id();
    }

    function add_team_member($params) {

        $this->db->insert('im_team', $params);
        return $this->db->insert_id();
    }

    function get_team_members($limit = NULL, $start = 0) {
        
        $this->db->order_by("id DESC");
        return $this->db->get_where('im_team', array('status' => 'Enabled'))->result_array();
    }

    function delete_team_member($id) {
        
        $this->db->delete('im_team', array('id' => $id));
        return $this->db->affected_rows();
    }

    function email_checkup($email) {
        
        return $this->db->get_where($this->table, array('email' => $email, 'archived' => 'No'))->num_rows();
    }
    
    function add_user_other_info($params) {

        $this->db->insert('im_users_info', $params);
        return $this->db->insert_id();
    }
    
    function get_user_other_info($user_id) {
        
        return $this->db->get_where('im_users_info', array('user_id' => $user_id))->row_array();
        
    }
    
    function update_user_other_info($params, $user_id) {
        
        $this->db->update('im_users_info', $params, array('user_id' => $user_id));
        return $this->db->affected_rows();
        
        
    }
    
    public function checkUser($data = array()) {
        
        $this->db->select($this->primaryKey);
        $this->db->from($this->table);
        $this->db->where(array('oauth_provider' => $data['oauth_provider'], 'oauth_uid' => $data['oauth_uid']));
        $query = $this->db->get();
        $check = $query->num_rows();

        if ($check > 0) {
            $result = $query->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->table, $data, array('id' => $result['id']));
            $userID = $result['id'];
        } else {
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->table, $data);
            $userID = $this->db->insert_id();
        }

        return $userID ? $userID : false;
    }
    
    function get_maintenance() {
        
        return $this->db->get_where('im_maintaence_mode', array('setting_name' => 'maintence_mode'))->row_array();
        
    }
    
    function update_maintenance($params) {
       return  $this->db->update('im_maintaence_mode',$params,array('setting_name' => 'maintence_mode'));
       //return $this->db->get_where('im_maintaence_mode', array('setting_name' => 'maintence_mode'))->row_array();
        
    }

}
