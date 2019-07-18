<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
	public function index()
	{
		$this->load->view('layouts/header');
		
		$this->load->view('layouts/footer');
	}

	public function category($catslug = 'all') {
		//$this->load->view('layouts/header');
		echo '<h1>Category ' . $catslug . '</h1>';
		//$this->load->view('layouts/footer');
	}

	public function page($pageslug = 'all') {
		//$this->load->view('layouts/header');
		echo '<h1>' . $pageslug . '</h1>';
		//$this->load->view('layouts/footer');
	}
}
