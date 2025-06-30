<?php
class Surat_keluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SK_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['sk'] = $this->SK_model->get();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('surat_keluar/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('judul');
    }
}
