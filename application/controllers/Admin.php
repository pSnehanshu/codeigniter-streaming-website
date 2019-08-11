<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
	{
        parent::__construct();

        if ($this->router->fetch_method() != 'login' && !emflx_is_admin_logged()) {
            redirect('admin/login');
        }

		$this->load->model('Object_model');
    }

    public function index() {
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layouts/footer');
    }
    
    public function login() {
        $message = '';

        // If password submitted
        if ($this->input->post('password')) {
            if (isset($_SERVER['EMFLX_ADMIN_PASS'])) {
                $admin_pass = $_SERVER['EMFLX_ADMIN_PASS'];
                $given_pass = hash('sha256', $this->input->post('password'));
                if ($admin_pass === $given_pass) {
                    // Login successful
                    emflx_admin_login();
                    return redirect('admin');
                } else {
                    // Login failed
                    $message = 'Incorrect password';
                }
            } else {
                $message = 'Admin password not set. Cannot login.';
            }
        }

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/login', array(
            'message' => $message
        ));
        $this->load->view('admin/layouts/footer');
    }

    public function logout() {
        emflx_admin_logout();
        redirect('admin/login');
    }
}
