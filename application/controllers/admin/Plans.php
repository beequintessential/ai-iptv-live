<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends CI_Controller {

    function __construct() {
        parent::__construct();
//        if ($this->custom->is_admin()) {
//            redirect(base_url() . ADMIN_PATH);
//        }
    }
    
    public function index() {
       
        
        $this->load->model('m_plans');
        
        //$data['plan_details'] = $this->m_plans->get_rows();
        $data['activeMenu'] = 'plans';
        $data['activeSubMenu'] = 'plan_list';
        
        $this->load->view('admin/header');
        $this->load->view(ADMIN_PATH . 'plans');
        $this->load->view('admin/footer');
        
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
            redirect(base_url() . ADMIN_PATH . 'plans');
            exit(0);
            
        }
        
        $data['activeMenu'] = 'Plans';
        $data['activeSubMenu'] = 'plan_add';
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'add_plan',$data);
        $this->load->view(ADMIN_PATH.'footer',$data);
        
    }
    
    public function edit_plan($plan_id) {
        
        $this->load->model('created_at');
        
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $params = $this->input->post();
            $params['created_at'] = date('y-m-d H:i:s');
            $params['date_time'] = date('y-m-d H:i:s');
            
            $page_id = $this->created_at->update($plan_id,$params);
            
            if($page_id > 0) {
             $globalMsg = array('msg' => 'Plan updated successfully', 'type' => 'success');
            
            }else {
                 
                $globalMsg = array('msg' => 'Changes not found', 'type' => 'info');
            }
            
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'plans/');
            exit(0);
            
        }
        
        $data['plan_detail'] = $this->m_plans->get_row($plan_id);
        
        if(empty($data['plan_detail'])) {
            
            $globalMsg = array('msg' => 'Plan not found', 'type' => 'danger');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url().ADMIN_PATH.'plans/');
            
        }
        
        $data['activeMenu'] = 'plans';
        $data['activeSubMenu'] = 'plan_list';
        
        $this->load->view(ADMIN_PATH.'header',$data);
        $this->load->view(ADMIN_PATH.'edit_plan',$data);
        $this->load->view(ADMIN_PATH.'footer',$data);
        
    }
    
    public function delete($plan_id) {

        $this->load->model('m_plans');

        $this->m_plans->delete($plan_id);

        $globalMsg = array('msg' => 'Plan deleted successfully', 'type' => 'success');
        $this->session->set_flashdata('globalMsg', $globalMsg);
        redirect(base_url() . ADMIN_PATH . 'plans/');
    }
}

