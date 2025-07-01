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
        $this->form_validation->set_rules('deskripsi');
        $this->form_validation->set_rules('pengirim');
        $this->form_validation->set_rules('tujuan');
        $this->form_validation->set_rules('tanggal');

        if($this->form_validation->run() == FALSE){
            $this->index();
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'pengirim' => $this->input->post('pengirim'),
                'tujuan' => $this->input->post('tujuan'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->SK_model->insert($data);
            redirect('surat_keluar');
        }
    }

    public function detail($id) {
        $data['sk'] = $this->SK_model->get_by_id($id);
        if (!$data['sk']) {
            show_404();
        }
        $this->load->view('surat/detail', $data);
    }

    public function edit($id) {
        $data['sk'] = $this->SK_model->get_by_id($id);
        $this->load->view('surat/edit', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('judul');
        $this->form_validation->set_rules('deskripsi');
        $this->form_validation->set_rules('pengirim');
        $this->form_validation->set_rules('tujuan');
        $this->form_validation->set_rules('tanggal');

        if($this->form_validation->run() == FALSE){
            $this->edit($id);
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'pengirim' => $this->input->post('pengirim'),
                'tujuan' => $this->input->post('tujuan'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->SK_model->update($id, $data);
            redirect('surat_keluar');
        }
    }

    public function hapus($id) {
        $this->SK_model->delete($id);
        redirect('surat_keluar');
    }
}
