<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Object_model extends CI_Model {
    
    public function get($id = 1, $expected_type = false, $get_unpublished = false) {
        if (!$get_unpublished) {
            $this->db->where('is_published', 1);
        }
        $this->db->where('id', $id);
        $query = $this->db->get('objects');

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

    public function get_slug($slug = 1, $expected_type = false, $get_unpublished = false) {
        if (!$get_unpublished) {
            $this->db->where('is_published', 1);
        }
        $this->db->where('slug', $slug);
        $query = $this->db->get('objects');
        
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


	public function get_children($slug, $expected_type = false, $start = 0, $num = 10, $get_unpublished = false) {
        if (!$get_unpublished) {
            $this->db->where('objects.is_published', 1);
        }
        $this->db->select('objects.*, object_heirarchy.child_order as object_order');
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

    public function get_children_by_id($id, $expected_type = false, $start = 0, $num = 10, $get_unpublished = false) {
        if (!$get_unpublished) {
            $this->db->where('objects.is_published', 1);
        }
        $this->db->select('objects.*, object_heirarchy.child_order as object_order');
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

    public function get_all($type = null, $start = 0, $num = 10, $get_unpublished = false) {
        if (!$get_unpublished) {
            $this->db->where('is_published', 1);
        }
        if ($type) {
            $this->db->where('type', $type);
        }
        $this->db->limit($num, $start);
        $query = $this->db->get('objects');
        return $query->result();
    }
}
