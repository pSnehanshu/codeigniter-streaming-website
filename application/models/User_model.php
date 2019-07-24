<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function get_by_phone($phone) {
        $query = $this->db->get_where('users', array('phone' => $phone));
        if ($query->num_rows() == 1){
            $user = $query->result()[0];
            return $user;
        }
        else
            return null;
    }
}
