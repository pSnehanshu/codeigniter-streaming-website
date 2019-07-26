<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->database();
    }

    public function login()
    {
        $this->load->view('auth/login', array(
            'app_id' => $this->config->item('fb_app_id'),
            'app_version' => $this->config->item('fb_accountkit_version')
        ));
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
        if (isset($_POST['next'])) {
            $next = $_POST['next'];
        }

        // Exchange authorization code for access token
        $token_exchange_url = 'https://graph.accountkit.com/' . $version . '/access_token?' .
            'grant_type=authorization_code' .
            '&code=' . $_POST['code'] .
            "&access_token=AA|$app_id|$secret";
        //die($token_exchange_url);
        $data = doCurl($token_exchange_url);
        //echo '<pre>';print_r($data);exit;
        $user_id = $data['id'];
        $user_access_token = $data['access_token'];
        $refresh_interval = $data['token_refresh_interval_sec'];

        // Get Account Kit information
        $me_endpoint_url = 'https://graph.accountkit.com/' . $version . '/me?' .
            'access_token=' . $user_access_token;
        $data = doCurl($me_endpoint_url);

        $phone = isset($data['phone']) ? $data['phone']['number'] : '';
        $email = isset($data['email']) ? $data['email']['address'] : '';

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
                die('Registered with id ' . $uid);
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
