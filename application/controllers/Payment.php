<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/razorpay/Razorpay.php';

use Razorpay\Api\Api;

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Payment_model');
    }

    public function rzpcb()
    {
        if (!$this->input->post('payment_id')) {
            redirect('home');
        }

        try {
            // Initialize razorpay
            $api = new Api('rzp_test_fzZ7zRtySVTGkq', 'xVc8l1sWzQSDqfvNcUaCKoFQ');

            // Capture!!
            $payment = $api->payment->fetch($this->input->post('payment_id'))->capture(array('amount' => '9900'));

            if ($payment->status == 'captured') {
                $uid = eflx_current_user(true)->id;
                $amount = $payment->amount / 100; // Converting to rupee from paisa
                $currency = $payment->currency;

                // Payment successfully captured
                $res = $this->Payment_model->create($uid, $this->input->post('payment_id'), $amount, $currency);

                if ($res) {
                    // Payment recorded
                    redirect('home/plans');
                } else {
                    throw new Exception("Payment counldn't be recorded. Please contact support.");
                }
            } else {
                throw new Exception("Payment status isn't captured. Please retry payment.");
            }
        } catch (Exception $e) { 
            // Show failed message
            echo $e->getMessage();
        }
    }
}
