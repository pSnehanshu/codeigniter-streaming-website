<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Object_model');
    }
    
    public function login() {
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/login');
        $this->load->view('admin/layouts/footer');
    }
}
