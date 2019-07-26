<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model{
    public function create($uid, $tx_id, $amount, $currency = 'INR') {
        return $this->db->insert('payment_history', array(
            'uid' => $uid,
            'tx_id' => $tx_id,
            'amount' => $amount,
            'currency' => $currency
        ));
    }
}
