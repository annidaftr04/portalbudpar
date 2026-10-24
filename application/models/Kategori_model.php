<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function get_all() {
        return $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result();
    }

    public function get_by_id($id) {
        return $this->db->where('id_kategori', $id)->get('kategori')->row();
    }

    public function insert($data) {
        $this->db->insert('kategori', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        return $this->db->where('id_kategori', $id)->update('kategori', $data);
    }

    public function delete($id) {
        return $this->db->where('id_kategori', $id)->delete('kategori');
    }
}
