<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Surat_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SM_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth'); 
        }
    }

    public function index()
    {
        var_dump($this->session->flashdata());
        die;
        $data['surat_masuk'] = $this->SM_model->get();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['surat_masuk'] = $this->SM_model->get();
            $this->load->view('layout/header');
            $this->load->view('layout/sidebar');
            $this->load->view('surat_masuk/index', $data);
            $this->load->view('layout/footer');
        } else {

            if (!empty($_FILES['file_surat']['name'])) {
                $config['upload_path']   = './uploads/surat_masuk/';
                $config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png';
                $config['max_size']      = 20048;
                $config['encrypt_name']  = TRUE;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file_surat')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal: ' . strip_tags($error) . '</div>');
                    redirect('surat_masuk');
                    return;
                } else {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                }
            }

            $data = array(
                'judul'      => $this->input->post('judul'),
                'deskripsi'  => $this->input->post('deskripsi'),
                'pengirim'   => $this->input->post('pengirim'),
                'tujuan'     => $this->input->post('tujuan'),
                'tanggal'    => $this->input->post('tanggal'),
                'file_surat' => $file_name
            );

            $this->SM_model->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            redirect('surat_masuk');
        }
    }

    public function detail($id)
    {
        $data['surat_masuk'] = $this->SM_model->get_by_id($id);

        if (!$data['surat_masuk']) {
            show_404();
        }

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('surat_masuk/detail', $data);
        $this->load->view('layout/footer');
    }

    public function edit($id)
    {
        $data['surat_masuk'] = $this->SM_model->get_by_id($id);

        if (!$data['surat_masuk']) {
            show_404();
        }
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('surat_masuk/edit', $data);
        $this->load->view('layout/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required|trim');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {

            $data = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'pengirim' => $this->input->post('pengirim'),
                'tujuan' => $this->input->post('tujuan'),
                'tanggal' => $this->input->post('tanggal')
            );

            if (!empty($_FILES['file_surat']['name'])) {
                $config['upload_path']          = './uploads/surat_masuk/';
                $config['allowed_types']        = 'jpg|png|jpeg|pdf|doc|docx';
                $config['max_size']             = 10080;
                $config['file_name']            = 'file_name' . time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('file_surat')) {
                    $upload_data = $this->upload->data();
                    $data['file_surat'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $this->edit($id);
                }
            }

            $this->SM_model->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diperbarui!</div>');
            redirect('surat_masuk');
        }
    }

    public function hapus($id)
    {
        $this->SM_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('surat_masuk');
    }


    public function pdf()
    {
        $start_date = $this->input->get('start_date');
        $end_date   = $this->input->get('end_date');
        if ($start_date && $end_date) {
            $data['surat_masuk'] = $this->SM_model->get_filtered($start_date, $end_date);
        } else {
            $data['surat_masuk'] = $this->SM_model->get();
        }

        $this->load->view('surat_masuk/laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';

        $html = $this->output->get_output();

        $options = new Options();
        $options->set('isHtml5ParserEnable', true);
        $options->set('isPhpEnable', true);

        $dompdf = new Dompdf($options);
        $dompdf->setPaper($paper_size, $orientation);

        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("laporan_surat_masuk.pdf", array('attachment'));
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['surat_masuk'] = $this->SM_model->get_keyword($keyword);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('layout/footer');
    }
}
