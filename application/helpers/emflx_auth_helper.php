<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('emflx_current_user'))
{   
    // Returns current logged in user or false
    function emflx_current_user($get_user = false)
    {
        if (isset($_SESSION['emflx_login']) && $_SESSION['emflx_login'] != null) {
            if ($get_user) {
                // Fetch current user details
                $CI = &get_instance();
                $CI->load->model('User_model');
                $user = $CI->User_model->get_by_phone($_SESSION['emflx_login']['phone']);
                if ($user) {
                    return $user;
                } else return false;
            }
            else return $_SESSION['emflx_login'];
        }
        else {
            return false;
        }
    }   
}

if ( ! function_exists('emflx_login'))
{   
    // Tries to login a user
    function emflx_login($user = array())
    {
        if (emflx_current_user()) { // An user is already logged in, can't login again
            return false;
        }
        else {
            $_SESSION['emflx_login'] = $user;
            return true;
        }
    }   
}

if ( ! function_exists('emflx_logout'))
{   
    // Tries to logout a user
    function emflx_logout()
    {
        $_SESSION['emflx_login'] = null;
    }   
}
