<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        if ($this->custom->is_admin()) {
            redirect(base_url() . ADMIN_PATH);
        }
    }

    public function index() {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $post = $this->input->post();
            $this->load->model('m_users');
            $userInfo = $this->m_users->login($post['email'], $post['password']);
            
            if ($userInfo !== false && ($userInfo['user_type'] == 'Admin')) {
                
                $this->session->set_userdata('userInfo', $userInfo);
                redirect(base_url() . ADMIN_PATH);
                exit(0);
                
            }
            
            $globalMsg = array('msg' => 'Username or password is incorrect', 'type' => 'danger');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'login/');
            
        }

        $this->load->view(ADMIN_PATH . 'login');
    }

    function forgotpassword() {

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $post = $this->input->post();

            $this->load->model('m_users');

            $emailCount = $this->m_users->email_checkup($post['email']);

            if ($emailCount > 0) {
                $userInfo = $this->m_users->get_user_by_email($post['email']);

                $token = $this->custom->rand_alph_str(10);
                $this->m_users->update(array('token' => $token), $userInfo['user_id']);

                $message = 'Hello ' . $userInfo['first_name'] . ',<br><br>';
                $message .= 'Please click on the following link to reset you password:<br>';
                $message .= '<a href="' . base_url() . ADMIN_PATH . 'login/reset_password/' . md5($userInfo['user_id']) . '/' . $token . '">' . base_url() . ADMIN_PATH . 'login/reset_password/' . md5($userInfo['user_id']) . '/' . $token . '</a><br><br>';
                $message .= 'Thank You!';

                $this->load->library('email');
                $this->email->set_mailtype("html");
                $this->email->from(SEND_EMAILS_FROM, SITE_NAME);
                $this->email->to($userInfo['email']);
                $this->email->subject("Reset Password");
                $this->email->message($message);
                $this->email->send();

                $globalMsg = array('msg' => 'Please check your email.', 'type' => 'success');
                $this->session->set_flashdata('globalMsg', $globalMsg);
                redirect(base_url() . ADMIN_PATH . 'login/forgotpassword/');
                exit(0);
            }

            $globalMsg = array('msg' => 'Email is not registered with us.', 'type' => 'error');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'login/forgotpassword/');
        }

        $this->load->view(ADMIN_PATH . 'forgotpassword');
    }

    function reset_password($user_id = false, $token = false) {

        if ($user_id === false || $token === false || $user_id == '' || $token == '') {
            $globalMsg = array('msg' => 'Invalid or expired link.', 'type' => 'error');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'login/');
            exit;
        }

        $this->load->model('m_users');
        $userInfo = $this->m_users->verification_pass_rest_link($user_id, $token);

        if (!empty($userInfo)) {

            $password = $this->custom->rand_alph_str(6);
            $params = array('password' => md5($password), 'token' => '');
            $this->m_users->update($params, $userInfo['user_id']);

            $message = 'Hello ' . $userInfo['first_name'] . ',<br><br>';
            $message .= 'You have successfully reset your password. Here is the new password:<br>';
            $message .= 'Password: ' . $password . '<br><br>';
            $message .= 'Thank You!';

            $this->load->library('email');
            $this->email->set_mailtype("html");
            $this->email->from(SEND_EMAILS_FROM, SITE_NAME);
            $this->email->to($userInfo['email']);
            $this->email->subject("New Password Received");
            $this->email->message($message);
            $this->email->send();

            $globalMsg = array('msg' => 'Password has sent to your email.', 'type' => 'success');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'login');
            exit;
            
        } else {
            
            $globalMsg = array('msg' => 'Invalid or expired link.', 'type' => 'error');
            $this->session->set_flashdata('globalMsg', $globalMsg);
            redirect(base_url() . ADMIN_PATH . 'login');
            exit;
        }
    }

}
