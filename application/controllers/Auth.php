<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
    }

    public function logout()
    {
        emflx_logout();
        redirect('/');
    }

    public function accountkit_cb()
    {
        // Initialize variables
        $app_id = $this->config->item('fb_app_id');
        $secret = $this->config->item('fb_accountkit_secret');
        $version = $this->config->item('fb_accountkit_version');
        $next = 'home';

        // Extract csrf and redirect url
        $state = explode('@', $this->input->get('state'));
        if (isset($state[0])) $csrf = $state[0];
        if (isset($state[1])) $next = $state[1];

        // Verify $csrf
        
        // Status
        if ($this->input->get('status') != 'PARTIALLY_AUTHENTICATED') {
            redirect($next);
        }

        // Exchange authorization code for access token
        $token_exchange_url = 'https://graph.accountkit.com/' . $version . '/access_token?' .
            'grant_type=authorization_code' .
            '&code=' . $this->input->get('code') .
            "&access_token=AA|$app_id|$secret";

        $data = doCurl($token_exchange_url);

        // Please check if the data is received

        $user_id = $data['id'];
        $user_access_token = $data['access_token'];
        $refresh_interval = $data['token_refresh_interval_sec'];

        // Get Account Kit information
        $me_endpoint_url = 'https://graph.accountkit.com/' . $version . '/me?' .
            'access_token=' . $user_access_token;
        $data = doCurl($me_endpoint_url);

        // Please check if the data is received

        $phone = isset($data['phone']) ? $data['phone']['number'] : '';
        $email = isset($data['email']) ? $data['email']['address'] : '';

        if (strlen($phone) < 1) {
            redirect($next);
        }

        // Sign up or login
        $query = $this->db->get_where('users', array('phone' => $phone));
        $num_rows = $query->num_rows();
        if ($num_rows == 1) { // user exists, Login 
            if (emflx_login(array('phone' => $phone))) {
                redirect($next);
            } else {
                die('Unable to login');
            }
        } else if ($num_rows < 1) { // New user, signup
            $user_insert_data = array(
                'email' => $email,
                'phone' => $phone,
            );
            if ($this->db->insert('users', $user_insert_data)) {
                $uid = $this->db->insert_id();
                // Send verification email as well

                // Login it
                if (emflx_login(array('uid' => $uid, 'phone' => $phone))) {
                    redirect($next);
                } else {
                    die('Unable to login new user');
                }
            } else {
                die('Oops! An internal error occured.');
            }
        } else { // There's an  issue in db. Two users with same phone number
            die('There are more than one users with the same phone number. This is an anamoly. Please inform the site admin.');
        }
    }
}

// Method to send Get request to url
function doCurl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return $data;
}
