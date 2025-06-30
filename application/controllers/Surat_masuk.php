<?php
class Surat_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SM_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['sm'] = $this->SM_model->get();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('judul');
    }
}
