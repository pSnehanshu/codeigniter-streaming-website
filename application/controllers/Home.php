<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
	public function index()
	{
		$this->load->view('layouts/header');
		
		$this->load->view('layouts/footer');
	}

	public function category($catslug = 'all') {
		$ref = $this->input->get('ref');
		$this->load->model('Object_model');
		$objects = $this->Object_model->get_children($catslug);

		$this->load->view('layouts/header');
		$this->load->view('category', array(
			'objects' => $objects,
			'slug' => $catslug,
			'ref' => explode('/', $ref),
			'next_ref' => $ref.'/'.$catslug
		));
		$this->load->view('layouts/footer');
	}

	public function page($pageslug = 'all') {
		//$this->load->view('layouts/header');
		echo '<h1>' . $pageslug . '</h1>';
		//$this->load->view('layouts/footer');
	}
}