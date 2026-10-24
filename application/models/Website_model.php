<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_model extends CI_Model {

    public function get_all()
    {
        // Ganti $this->table dengan 'website'
        return $this->db->get('website')->result(); 
    }

    public function get_by_id($id)
    {
        // Ganti $this->table dengan 'website'
        return $this->db->get_where('website', ['id_website' => $id])->row();
    }

    public function insert($data)
    {
        // Ganti $this->table dengan 'website'
        return $this->db->insert('website', $data);
    }

    public function update($id, $data)
    {
        // Ganti $this->table dengan 'website'
        return $this->db->update('website', $data, ['id_website' => $id]);
    }

    public function delete($id)
    {
        // Ganti $this->table dengan 'website'
        return $this->db->delete('website', ['id_website' => $id]);
    }
    
    // Untuk validasi slug saat edit
    public function check_slug_exists($slug, $id)
    {
        $this->db->where('slug', $slug);
        $this->db->where('id_website !=', $id);
        // Ganti $this->table dengan 'website'
        return $this->db->get('website')->row();
    }

}