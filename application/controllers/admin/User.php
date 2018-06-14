<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct() {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        
        if(!$this->custom->is_admin()) {
            redirect(base_url().ADMIN_PATH.'login/');
        }
        
    }
    public function index() {
        
       $data['activeMenu'] = 'dashboard';
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'home',$data);
        $this->load->view(ADMIN_PATH.'footer',$data);
        
    }
    function profile() {
                
        $this->load->view(ADMIN_PATH.'header');
        $this->load->view(ADMIN_PATH.'profile');
        $this->load->view(ADMIN_PATH.'footer'); 
        
    }
    
    function save_profile_info() {
         $this->load->model('m_users');
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $userInfo = $this->session->userdata('userInfo');
            $params = $this->input->post();
            
            $config['upload_path'] = APPPATH.'../uploads/avatar/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['file_name'] = $this->custom->rand_alph_str(20);
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if ( $this->upload->do_upload('profile_image')) {
                
                $file_data = $this->upload->data();
                $params['profile_image'] = $file_data['file_name'];
                
                if($params['old_profile_image'] != '') {
                    @unlink(__DIR__.'/../../../uploads/avatar/'.$params['old_profile_image']);
                }
                
            }
            unset($params['old_profile_image']);
            $result = $this->m_users->update($params,$userInfo['user_id']);
            
            if($result) {
                
                $userInfo = $this->session->userdata('userInfo');
                $userInfo = array_replace($userInfo, $params);
                $this->session->set_userdata('userInfo', $userInfo);
                $globalMsg = array('msg' => 'Data saved successfully', 'type' => 'success');
                
            }
            else {
                
                $globalMsg = array('msg' => 'Changes not found', 'type' => 'info');
                
            }
            
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url().ADMIN_PATH.'user/profile');
            exit(0);
            
        }
        
    }
    
    function change_password() {
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            $params = $this->input->post();
            
            $this->load->model('m_users');
            $result = $this->m_users->change_password($params);
            
            if($result > 0) {
                $globalMsg = array('msg' => 'Password changed successfully', 'type' => 'success');
            }
            else {
                $globalMsg = array('msg' => 'Current password isn\'t correct. Please enter valid password.', 'type' => 'error');
            }
            
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url().ADMIN_PATH.'user/profile');
            exit(0);
            
        }
    }
    function logout() {
        
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect(base_url().ADMIN_PATH.'login/');
        
    }
    public function plans() {
       
        $this->load->model('m_plans');
        
        $data['plan_details'] = $this->m_plans->get_rows();
        $data['activeMenu'] = 'plans';
        $data['activeSubMenu'] = 'plan_list';
        
        $this->load->view('admin/header',$data);
        $this->load->view('admin/plans',$data);
        $this->load->view('admin/footer',$data);
        
    }
    public function add_plan() {
        
        $this->load->model('m_plans');
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $params = $this->input->post();
            $params['created_at'] = date('Y-m-d H:i:s');
            $params['date_time'] = date('Y-m-d H:i:s');
            
            
            $page_id = $this->m_plans->add_new($params);
            
            if ($page_id > 0) {
                $globalMsg = array('msg' => 'Plan added successfully', 'type' => 'success');
            } else {
                $globalMsg = array('msg' => 'Changes not found', 'type' => 'info');
            }
            
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'user/plans');
            exit(0);
            
        }
        
        $data['activeMenu'] = 'Plans';
        $data['activeSubMenu'] = 'plan_add';
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'add_plan',$data);
        $this->load->view(ADMIN_PATH.'footer',$data);
        
    }
    
    public function edit_plan($plan_id) {
        
        $this->load->model('m_plans');
        
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $params = $this->input->post();
            $params['date_time'] = date('y-m-d H:i:s');
            
            $page_id = $this->m_plans->update($plan_id,$params);
            
            if($page_id > 0) {
             $globalMsg = array('msg' => 'Plan updated successfully', 'type' => 'success');
            
            }else {
                 
                $globalMsg = array('msg' => 'Changes not found', 'type' => 'info');
            }
            
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'user/plans');
            exit(0);
            
        }
        
        $data['plan_detail'] = $this->m_plans->get_row($plan_id);
        
        if(empty($data['plan_detail'])) {
            
            $globalMsg = array('msg' => 'Plan not found', 'type' => 'danger');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url().ADMIN_PATH.'user/plans');
            
        }
        
        $data['activeMenu'] = 'plans';
        $data['activeSubMenu'] = 'plan_list';
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'edit_plan',$data);
        $this->load->view(ADMIN_PATH.'footer',$data);
        
    }
    
    public function plan_delete($plan_id) {

        $this->load->model('m_plans');

        $this->m_plans->delete($plan_id);

        $globalMsg = array('msg' => 'Plan deleted successfully', 'type' => 'success');
        $this->session->set_flashdata('globalMsg', $globalMsg);
        redirect(base_url() . ADMIN_PATH . 'users/plans');
    }
    
    public function testimonials() {
        $this->load->model('m_testimonials');
        
        $data['activeMenu'] = 'testimonials';
        $data['activeSubMenu'] = 'testimonial_list';
        $data['testimonial_details'] = $this->m_testimonials->get_rows();
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'testimonials',$data);
    

}

    public function add_testimonials() {
        
        $this->load->model('m_testimonials');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $params = $this->input->post();
            $params['date_time'] = date('Y-m-d H:i:s');
            
            $config['upload_path'] = APPPATH.'../uploads/testimonials/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['file_name'] = $this->custom->rand_alph_str(20);
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if ( $this->upload->do_upload('image')) {
                $file_data = $this->upload->data();
                $params['image'] = $file_data['file_name'];
            }
            
            $page_id = $this->m_testimonials->add_new($params);
            
            if ($page_id > 0) {
                $globalMsg = array('msg' => 'Testimonials added successfully', 'type' => 'success');
            } else {
                $globalMsg = array('msg' => 'Changes not found', 'type' => 'info');
            }
            
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'user/testimonials');
            exit(0);
        }
        
        $data['activeMenu'] = 'testimonials';
        $data['activeSubMenu'] = 'add_testimonial';
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'add_testimonial',$data);
        $this->load->view(ADMIN_PATH.'footer',$data);
    }
    
    public function edit_testimonial($id) {
        
        $this->load->model('m_testimonials');
         if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
           $params = $this->input->post();
        
            $config['upload_path'] = APPPATH.'../uploads/testimonials/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['file_name'] = $this->custom->rand_alph_str(20);
            
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('image')) {
                
                $file_data = $this->upload->data();
                $params['image'] = $file_data['file_name'];
                
                if($params['old_image'] != '') {
                    @unlink(__DIR__.'/../../../uploads/testimonials/'.$params['old_image']);
                }
            }
            unset($params['old_image']);
            
            $page_id = $this->m_testimonials->update($id,$params);
            
            if($page_id > 0) {
             $globalMsg = array('msg' => 'Testimonial updated successfully', 'type' => 'success');
            
            }else {
                $globalMsg = array('msg' => 'Changes not found', 'type' => 'info');
            }
            
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'user/testimonials');
            exit(0);
            
        }
        
        $data['testimonial_detail'] = $this->m_testimonials->get_row($id);
        
        if(empty($data['testimonial_detail'])) {
            
            $globalMsg = array('msg' => 'testimonial not found', 'type' => 'danger');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url().ADMIN_PATH.'user/testimonials/');
        }
        
        $data['activeMenu'] = 'testimonials';
        $data['activeSubMenu'] = 'testimonial_list';
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'edit_testimonial',$data);
        $this->load->view(ADMIN_PATH.'footer',$data);
    }
    
    public  function testimonials_delete($id) {

        $this->load->model('m_testimonials');
        $this->m_testimonials->delete($id);

        $globalMsg = array('msg' => 'Testimonials deleted successfully', 'type' => 'success');
        $this->session->set_flashdata('globalMsg', $globalMsg);
        redirect(base_url() . ADMIN_PATH . 'user/testimonials/');
    }
    
    public function features() {
        $this->load->model('m_features');
        
        $data['activeMenu'] = 'features';
        $data['activeSubMenu'] = 'feature_list';
        $data['faeture_details'] = $this->m_features->get_rows();
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'features',$data);
    

}
    
    public function add_feature() {
        
        $this->load->model('m_features');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $params = $this->input->post();
            $params['date_time'] = date('Y-m-d H:i:s');
            
            $config['upload_path'] = APPPATH.'../uploads/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['file_name'] = $this->custom->rand_alph_str(20);
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if ( $this->upload->do_upload('icon_image')) {
                $file_data = $this->upload->data();
                $params['icon_image'] = $file_data['file_name'];
            }
            
            $page_id = $this->m_features->add_new($params);
            
            if ($page_id > 0) {
                $globalMsg = array('msg' => 'feature  added successfully', 'type' => 'success');
            } else {
                $globalMsg = array('msg' => 'Changes not found', 'type' => 'info');
            }
            
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'user/features');
            exit(0);
        }
        
        $data['activeMenu'] = 'faetures';
        $data['activeSubMenu'] = 'add_feature';
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'add_feature',$data);
        $this->load->view(ADMIN_PATH.'footer',$data);
    }
    
    public function  edit_feature($id){
        
        $this->load->model('m_features');

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $params = $this->input->post();
            $params['date_time'] = date('Y-m-d H:i:s'); 
            
            $config['upload_path'] = APPPATH . '../uploads/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $config['file_name'] = $this->custom->rand_alph_str(20);

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $params['icon_image'] = $params['old_icon_image'];
            
            if ($this->upload->do_upload('icon_image')) {

                $file_data = $this->upload->data();
                $params['icon_image'] = $file_data['file_name'];
                if ($params['old_icon_image'] != '') {
                    @unlink(__DIR__ . '/../../../uploads/' . $params['old_icon_image']);
                }
            }
            
            unset($params['old_icon_image']);

            $jobs_id = $this->m_features->update($id, $params);

            if ($jobs_id > 0) {
                $globalMsg = array('msg' => 'faeture updated successfully', 'type' => 'success');
            } else {
                $globalMsg = array('msg' => 'Changes not found', 'type' => 'info');
            }
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() .ADMIN_PATH. 'user/features');
            exit(0);
        }
        
        $data['feature_details'] = $this->m_features->get_row($id);
        
        if (empty($data['feature_details'])) {
            
            $globalMsg = array('msg' => 'faeture not found', 'type' => 'danger');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() .ADMIN_PATH. 'user/features/');
            
        }

        $this->load->view(ADMIN_PATH.'header', $data);
        $this->load->view(ADMIN_PATH.'edit_feature', $data);
        $this->load->view(ADMIN_PATH.'footer', $data);
        
    }
}