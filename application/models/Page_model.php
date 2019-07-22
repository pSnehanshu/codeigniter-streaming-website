<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model{
    public function get_slug($slug) {
        $query = $this->db->get_where('pages', array('slug' => $slug));
        if ($query->num_rows() == 1){
            $page = $query->result()[0];
            return $page;
        }
        else
            return null;
    }
}
