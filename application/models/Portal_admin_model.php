<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal_admin_model extends CI_Model {

    public function get_by_email($email) {
        return $this->db->where('email', $email)->get('portal_admin')->row();
    }

    public function get_by_id($id) {
        return $this->db->where('id_admin', $id)->get('portal_admin')->row();
    }

    public function insert($data) {
        $this->db->insert('portal_admin', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        return $this->db->where('id_admin', $id)->update('portal_admin', $data);
    }

    public function delete($id) {
        return $this->db->where('id_admin', $id)->delete('portal_admin');
    }
}
