<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect(''); 
        }
        $this->load->view('auth/index'); 
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Email/Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index');
        } else {
            $username_or_email = $this->input->post('username'); 
            $password = $this->input->post('password');

            $user = $this->UserModel->get_user_by_username($username_or_email);

            if ($user) {
                if (md5($password) === $user->password) { 
                    $sess_array = array(
                        'id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($sess_array);

                    redirect('');
                } else {
                    $this->session->set_flashdata('error', 'Username atau Password salah.');
                    redirect('index.php/auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah.');
                redirect('index.php/auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();

        redirect('index.php/auth');
    }

}