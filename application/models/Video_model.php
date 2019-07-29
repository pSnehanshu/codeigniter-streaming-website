<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model{
    public function get_info($id) {
        $query = $this->db->get_where('video_info', array('object_id' => $id));
        if ($query->num_rows() == 1) {
            return $query->result()[0];
        } else {
            return null;
        }
    }
}
