<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Object_model');
	}
	
	// Main page
	public function index()
	{
		$this->load->view('layouts/header');
		
		$this->load->view('layouts/footer');
	}

	// Category listing
	public function category($slug) {
		$ref = $this->input->get('ref');
		$objects = $this->Object_model->get_children($slug);

		$this->load->view('layouts/header');
		$this->load->view('category', array(
			'objects' => $objects,
			'slug' => $slug,
			'ref' => explode('/', $ref),
			'next_ref' => $ref.'/'.$slug
		));
		$this->load->view('layouts/footer');
	}

	// Redirects to correct view page for any object
	public function goto($id = 1) {
		$ref = $this->input->get('ref');
		$object = $this->Object_model->get($id);

		// If object doesn't exists, then show 404
		if ($object == null) {
			show_404();
		}
		
		switch($object->type) {
			case 'video': redirect('home/watch/'.$object->slug.'?ref='.urlencode($ref)); break;
			case 'show': redirect('home/show/'.$object->slug.'?ref='.urlencode($ref)); break;
			case 'season': redirect('home/season/'.$object->slug.'?ref='.urlencode($ref)); break;
			case 'category': redirect('home/category/'.$object->slug.'?ref='.urlencode($ref)); break;
			default: show_404();
		}
	}

	// View page for a show. e.g. Game of Thrones
	public function show($slug) {
		$ref = $this->input->get('ref');
		$object = $this->Object_model->get_slug($slug, 'show');
		
		// If object doesn't exists, then show 404
		if (!$object) {
			show_404();
		}

		//Get all the seasons
		$seasons = $this->Object_model->get_children($slug, 'season');

		// Get the shows of the selected season
		$selected_season = $this->input->get('seasonid');
		if (!$selected_season) { // No selected season
			// Let the first season be the selected season
			if (count($seasons) > 0) {
				$selected_season = $seasons[0]->id;
			}
		}
		
		$this->load->view('layouts/header');
		$this->load->view('show', array('show' => $object, 'seasons' => $seasons, 'selected_season' => $selected_season));
		$this->load->view('layouts/footer');
	}

	public function page($pageslug = 'all') {
		//$this->load->view('layouts/header');
		echo '<h1>' . $pageslug . '</h1>';
		//$this->load->view('layouts/footer');
	}
}
