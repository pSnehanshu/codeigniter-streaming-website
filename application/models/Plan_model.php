<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_model extends CI_Model{
    function is_premium_user($uid = null) {
        // Fetch all transactions within the last 30 days.
        // If there are any, it is a premium user
        if ($uid == null) {
            $user = eflx_current_user(true);
            if (!$user) return false;
            else $uid = $user->id;
        }
        $this->db->where('uid', $uid);
        $this->db->where('payment_date > (CURRENT_TIMESTAMP - INTERVAL 1 MONTH)');
        $this->db->order_by('payment_date', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('payment_history');

        return $query->num_rows() > 0;
    }
}
