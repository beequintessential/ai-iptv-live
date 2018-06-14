<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

    function __construct() {
        parent::__construct();
      
    }

    public function index() {
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
            redirect(base_url() . ADMIN_PATH . 'testimonials');
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
            redirect(base_url() . ADMIN_PATH . 'testimonials');
            exit(0);
            
        }
        
        $data['testimonial_detail'] = $this->m_testimonials->get_row($id);
        
        if(empty($data['testimonial_detail'])) {
            
            $globalMsg = array('msg' => 'testimonial not found', 'type' => 'danger');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url().ADMIN_PATH.'testimonials/');
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
        redirect(base_url() . ADMIN_PATH . 'testimonials/');
    }

}