<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SK_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $query = $this->db->get('surat_keluar');
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
}
