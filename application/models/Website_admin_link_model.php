<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_admin_link_model extends CI_Model {

    protected $id_field = 'id_link'; // Tetap simpan nama primary key

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Menyimpan data link admin baru.
     * @param array $data Data yang akan dimasukkan.
     * @return bool
     */
    public function insert($data)
    {
        // Langsung menggunakan nama tabel 'website_admin_link'
        return $this->db->insert('website_admin_link', $data);
    }

    /**
     * Mengambil semua link admin, di-JOIN dengan nama website.
     * @return array
     */
    // application/models/Website_admin_link_model.php

    public function get_all_with_website_name()
    {
        // === PERBAIKAN DILAKUKAN DI BARIS INI ===
        $this->db->select('website_admin_link.*, website.nama_website, website.image, website.deskripsi'); 
        // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ MENAMBAHKAN website.image, website.deskripsi
        
        $this->db->from('website_admin_link'); 
        // Join dengan tabel 'website'
        $this->db->join('website', 'website.id_website = website_admin_link.id_website', 'left');
        $this->db->order_by('website.nama_website', 'ASC');
        $this->db->order_by('website_admin_link.sort_order', 'ASC');
        return $this->db->get()->result();
    }

    /**
     * Mengambil satu data link berdasarkan ID.
     * @param int $id Primary key id_link.
     * @return object
     */
    public function get_by_id($id)
    {
        // Langsung menggunakan nama tabel 'website_admin_link'
        return $this->db->get_where('website_admin_link', array($this->id_field => $id))->row();
    }

    /**
     * Memperbarui data link admin.
     * @param int $id Primary key id_link.
     * @param array $data Data yang akan diperbarui.
     * @return bool
     */
    public function update($id, $data)
    {
        $this->db->where($this->id_field, $id);
        // Langsung menggunakan nama tabel 'website_admin_link'
        return $this->db->update('website_admin_link', $data);
    }

    /**
     * Menghapus data link admin.
     * @param int $id Primary key id_link.
     * @return bool
     */
    public function delete($id)
    {
        // Langsung menggunakan nama tabel 'website_admin_link'
        return $this->db->delete('website_admin_link', array($this->id_field => $id));
    }
}