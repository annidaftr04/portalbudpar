<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Daftar semua link admin dari website
    // application/controllers/Pengelola.php

public function index() {
    $this->db->select('w.nama_website, w.slug, wal.label, wal.url, wal.note, w.image, w.deskripsi'); // PASTIKAN SEMUA KOLOM TERMASUK IMAGE & DESKRIPSI ADA
    $this->db->from('website w');
    $this->db->join('website_admin_link wal', 'wal.id_website = w.id_website', 'inner'); // <<< UBAH KE INNER JOIN
    $this->db->where('w.is_active', 1);
    $this->db->order_by('w.nama_website ASC, wal.sort_order ASC');

    $data['links'] = $this->db->get()->result();

    $this->load->view('pengelola/list', $data);
}
}
