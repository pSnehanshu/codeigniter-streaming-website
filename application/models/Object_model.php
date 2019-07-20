<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Object_model extends CI_Model {
    public function get($id = 1) {
        $query = $this->db->get_where('objects', array('id' => $id));
        if ($query->num_rows() == 1)
            return $query->result()[0];
        else
            return null;
    }

	public function get_children($slug, $start = 0, $num = 10) {
        $this->db->select('objects.*');
        $this->db->from('objects, object_heirarchy');
        $this->db->where('object_heirarchy.parent = (SELECT id FROM objects WHERE slug = '.$this->db->escape($slug).')');
        $this->db->where('object_heirarchy.child = objects.id');
        $query = $this->db->get();
        return $query->result();
    }
}
