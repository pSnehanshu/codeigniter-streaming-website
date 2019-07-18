<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('eflx_current_user'))
{   
    // Returns current logged in user or false
    function eflx_current_user()
    {
        if (isset($_SESSION['emflx_login']) && $_SESSION['emflx_login'] != null) {
            return $_SESSION['emflx_login'];
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
        if (eflx_current_user()) { // An user is already logged in, can't login again
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
