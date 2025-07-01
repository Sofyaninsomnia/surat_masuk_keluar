<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SM_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['surat_masuk'] = $this->SM_model->get();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

        if($this->form_validation->run() == FALSE){
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('surat_masuk/tambah_form'); 
            $this->load->view('layout/footer');
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'pengirim' => $this->input->post('pengirim'),
                'tujuan' => $this->input->post('tujuan'),
                'tanggal' => $this->input->post('tanggal')
            );
            $this->SM_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            redirect('surat_masuk');
        }
    }

    public function detail($id) {
        $data['surat_masuk'] = $this->SM_model->get_by_id($id);

        if (!$data['surat_masuk']) {
            show_404();
        }

        $this->load->view('layout/header'); 
        $this->load->view('layout/sidebar');
        $this->load->view('surat_masuk/detail', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id) {
        $data['surat_masuk'] = $this->SM_model->get_by_id($id);

        if (!$data['surat_masuk']) {
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('surat_masuk/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update() {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

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
            $this->SM_model->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbarui!</div>');
            redirect('surat_masuk');
        }
    }

    public function hapus($id) {
        $this->SM_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('surat_masuk');
    }
}
