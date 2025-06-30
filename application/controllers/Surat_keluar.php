<?php 
class Surat_keluar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SK_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['sk'] = $this->SK_model->get();
        $this->load->view('surat/index', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('judul');
    }
}