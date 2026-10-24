<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal_log_model extends CI_Model {

    public function insert($data) {
        $this->db->insert('portal_log', $data);
        return $this->db->insert_id();
    }

    public function get_all($limit = 50) {
        $this->db->select('pl.*, pa.nama as nama_admin');
        $this->db->from('portal_log pl');
        $this->db->join('portal_admin pa', 'pa.id_admin = pl.id_admin', 'left');
        $this->db->order_by('pl.waktu', 'DESC');
        if ($limit) {
            $this->db->limit($limit);
        }
        return $this->db->get()->result();
    }
}
