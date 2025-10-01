<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('auth'); // Redirect to the login page if not logged in
		}
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('welcome_message');
		$this->load->view('layout/footer');
	}
}
