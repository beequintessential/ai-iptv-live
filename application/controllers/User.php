<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct() {
        
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
    }

    public function index() {
        $this->load->model('m_plans');
        $this->load->model('m_testimonials');
        $this->load->model('m_features');

        $data['plan_details'] = $this->m_plans->get_rows();
        $data['testi_details'] = $this->m_testimonials->get_rows();
        $data['feature_details'] = $this->m_features->get_rows();

        $this->load->view('header', $data);
        $this->load->view('home', $data);
        $this->load->view('footer', $data);
    }

    public function thankyou() {
        $this->load->view('header-inner');
        $this->load->view('thankyou');
        $this->load->view('footer-inner');
    }

    public function subscription() {
        $this->load->view('header-inner');
        $this->load->view('subscription');
        $this->load->view('footer-inner');
    }

    public function contactus() {
        $this->load->model('m_users');
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $params = $this->input->post();
            $params['date_time'] = date('Y-m-d H:i:s');

            $page_id = $this->m_users->add_contact($params);

            if ($page_id > 0) {

                echo $globalMsg =  'Your message has been sent. Thank you!';
            } else {

                echo $globalMsg = 'Error';
            }
        }
    }

}
