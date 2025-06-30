<?php 
class SK_model extends CI_Model {

    public function get(){
        $query = $this->db->get('surat_keluar');
        return $query->result();
    }
}