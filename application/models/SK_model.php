<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SK_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->select('sk.*,');
        $this->db->from('surat_keluar sk');
        $this->db->order_by('sk.tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_filtered($start_date, $end_date)
    {
        $this->db->select('sk.*');
        $this->db->from('surat_keluar sk');
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->order_by('sk.tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data)
    {
        return $this->db->insert('surat_keluar', $data);
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('surat_keluar');
        return $query->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('surat_keluar', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('surat_keluar');
    }

    public  function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('surat_keluar');
        $this->db->like('judul', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        $this->db->or_like('pengirim', $keyword);
        $this->db->or_like('tujuan', $keyword);
        $this->db->or_like('tanggal', $keyword);
        return $this->db->get()->result();
    }
}
