<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Object_model extends CI_Model {
    public function get($id = 1, $expected_type = false) {
        $query = $this->db->get_where('objects', array('id' => $id));
        if ($query->num_rows() == 1){
            $object = $query->result()[0];
            // Check if the object is of expected type
            if ($expected_type != false) {
                if ($object->type != $expected_type)
                    return null;
            }
            return $object;
        }
        else
            return null;
    }

    public function get_slug($slug = 1, $expected_type = false) {
        $query = $this->db->get_where('objects', array('slug' => $slug));
        if ($query->num_rows() == 1){
            $object = $query->result()[0];
            // Check if the object is of expected type
            if ($expected_type != false) {
                if ($object->type != $expected_type)
                    return null;
            }
            return $object;
        }
        else
            return null;
    }


	public function get_children($slug, $expected_type = false, $start = 0, $num = 10) {
        $this->db->select('objects.*');
        $this->db->from('objects, object_heirarchy');
        $this->db->where('object_heirarchy.parent = (SELECT id FROM objects WHERE slug = '.$this->db->escape($slug).')');
        $this->db->where('object_heirarchy.child = objects.id');
        if ($expected_type != false) {
            $this->db->where('objects.type', $expected_type);
        }
        $this->db->order_by('object_heirarchy.child_order', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_children_by_id($id, $expected_type = false, $start = 0, $num = 10) {
        $this->db->select('objects.*');
        $this->db->from('objects, object_heirarchy');
        $this->db->where('object_heirarchy.parent', $id);
        $this->db->where('object_heirarchy.child = objects.id');
        if ($expected_type != false) {
            $this->db->where('objects.type', $expected_type);
        }
        $this->db->order_by('object_heirarchy.child_order', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
