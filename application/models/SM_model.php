<?php
class SM_model extends CI_Model
{
    public function get()
    {
        $query = $this->db->get('surat_masuk');
        return $query->result();
    }
}