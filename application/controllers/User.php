<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Halaman utama user -> daftar semua website
    public function index() {
        // Ambil data website, termasuk kolom 'image' yang baru
        $websites = $this->db
            ->select('id_website, nama_website, deskripsi, user_url, image')
            ->where('is_active', 1)
            ->order_by('created_at', 'DESC')
            ->get('website')
            ->result();

        $data_for_view = [];
        foreach ($websites as $w) {
            // Buat properti 'image_url' yang digunakan di View.
            // Jika kolom 'image' di database berisi nama file (misal: 'icon_ekinerja.jpg'), 
            // maka kita gabungkan dengan base_url() agar menjadi link lengkap.
            if (!empty($w->image)) {
                $w->image_url = base_url('uploads/website_icons/' . $w->image); 
            } else {
                // Jika tidak ada gambar di database, gunakan placeholder default
                $w->image_url = base_url('assets/img/placeholder_default.png'); 
            }
            
            $data_for_view[] = $w;
        }

        $data['websites'] = $data_for_view;

        // $this->load->view('user/header');
        $this->load->view('user/home', $data); // Memuat View utama
        // $this->load->view('user/footer');
    }

    // Detail website by slug
    public function detail($slug) {
        $website = $this->db->where('slug', $slug)->get('website')->row();
        if (!$website) {
            show_404();
        }

        $data['website'] = $website;
        $this->load->view('user/header');
        $this->load->view('user/detail', $data);
        $this->load->view('user/footer');
    }
}
