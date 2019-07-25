<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model{
    public function get_active() {
        $this->db->where('is_published', 1);
        $this->db->order_by('display_order', 'ASC');
        $query = $this->db->get('home_banner');
        return $query->result();
    }
}
