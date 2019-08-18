<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Object_model');
	}

	// Main page
	public function index()
	{
		// Load banners
		$this->load->model('Banner_model');
		$banners = $this->Banner_model->get_active();

		// Load categories
		$categories = $this->Object_model->get_all('category');

		// Custom ordering of the categories
		$ordered_cats = array();
		$ordered_cats[0] = $categories[3];
		$ordered_cats[1] = $categories[2];
		$ordered_cats[2] = $categories[1];
		$ordered_cats[3] = $categories[0];
		
		$this->load->view('layouts/header', array('title' => 'Enjoy free and premium shows, videos and movies'));
		$this->load->view('home', array(
			'banners' => $banners,
			'categories' => $ordered_cats,
		));
		$this->load->view('layouts/footer');
	}

	// Category listing
	public function category($slug)
	{
		$ref = $this->input->get('ref');
		$objects = $this->Object_model->get_children($slug);

		$this->load->view('layouts/header', array(
			'title' => 'Enjoy '.$slug .', free and premium content available'
		));
		$this->load->view('category', array(
			'objects' => $objects,
			'slug' => $slug,
			'ref' => explode('/', $ref),
			'next_ref' => $ref . '/' . $slug
		));
		$this->load->view('layouts/footer');
	}

	public function ajax_category($id) {
		$children = $this->Object_model->get_children_by_id($id);
		$this->load->view('ajax_category', array('children' => $children));
	}

	// Video player page
	public function watch($slug)
	{
		$video = $this->Object_model->get_slug($slug, 'video');

		// If video doesn't exists, then show 404
		if (!$video) {
			show_404();
		}

		// Check if video is premium
		$video_is_premium = $video->is_premium;
		
		// Check if user is premium member
		$is_premium_user = false;
		$current_user = emflx_current_user(true);
		if ($current_user) {
			$this->load->model('Plan_model');
			$is_premium_user = $this->Plan_model->is_premium_user($current_user->id);
		}

		// Load video info
		$video_info = null;
		if ($is_premium_user || $current_user) {
			$this->load->model('Video_model');
			$video_info = $this->Video_model->get_info($video->id);
		}

		$this->load->view('layouts/header', array(
			'title' => 'Watch online "'.$video->title.'"',
			'description' => $video->description,
			'thumb' => $video->thumbnail
		));
		$this->load->view('video_watch', array(
			'video' => $video,
			'video_is_premium' => $video_is_premium,
			'should_play' => $is_premium_user, // Only valid for premium videos
			'user_logged_in' => !!$current_user,
			'video_info' => $video_info
		));
		$this->load->view('layouts/footer');
	}

	// View page for a show. e.g. Game of Thrones
	public function show($slug)
	{
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

		$this->load->view('layouts/header', array(
			'title' => $object->title,
			'description' => $object->description,
			'thumb' => $object->thumbnail
		));
		$this->load->view('show', array(
			'show' => $object,
			'seasons' => $seasons,
			'selected_season' => $selected_season
		));
		$this->load->view('layouts/footer');
	}

	public function season_ajax($id)
	{
		//Get all the video
		$videos = $this->Object_model->get_children_by_id($id, 'video');
		$this->load->view('season_video_list_ajax', array('videos' => $videos));
	}

	public function page($slug)
	{
		$this->load->model('Page_model');
		$page = $this->Page_model->get_slug($slug);
		if (!$page) {
			show_404();
		}

		$this->load->view('layouts/header', array('title' => $page->title));
		$this->load->view('page', array('page' => $page));
		$this->load->view('layouts/footer');
	}

	// Membership plans page
	public function plans()
	{
		$current_user = emflx_current_user(true);

		if ($current_user) {
			$is_free = true;
			$this->load->model('Plan_model');
			$is_premium = $this->Plan_model->is_premium_user($current_user->id);
		} else {
			$is_premium = false;
			$is_free = false;
		}

		$this->load->view('layouts/header', array('title' => 'Pricing'));
		$this->load->view('plans', array(
			'is_premium_user' => $is_premium,
			'is_free_user' => $is_free,
			'rzp_api_code' => $this->config->item('rzp_api_code')
		));
		$this->load->view('layouts/footer');
	}

	// Redirects to correct view page for any object based on id
	public function goto($id = 1)
	{
		$ref = $this->input->get('ref');
		$object = $this->Object_model->get($id);

		// If object doesn't exists, then show 404
		if ($object == null) {
			show_404();
		}

		switch ($object->type) {
			case 'video':
				redirect('home/watch/' . $object->slug . '?ref=' . urlencode($ref));
				break;
			case 'show':
				redirect('home/show/' . $object->slug . '?ref=' . urlencode($ref));
				break;
			case 'season':
				redirect('home/season/' . $object->slug . '?ref=' . urlencode($ref));
				break;
			case 'category':
				redirect('home/category/' . $object->slug . '?ref=' . urlencode($ref));
				break;
			default:
				show_404();
		}
	}

	// Redirects to correct view page for any object based on slug
	public function slug($slug)
	{
		$ref = $this->input->get('ref');
		$object = $this->Object_model->get_slug($slug);

		// If object doesn't exists, then show 404
		if ($object == null) {
			show_404();
		}

		switch ($object->type) {
			case 'video':
				redirect('home/watch/' . $object->slug . '?ref=' . urlencode($ref));
				break;
			case 'show':
				redirect('home/show/' . $object->slug . '?ref=' . urlencode($ref));
				break;
			case 'season':
				redirect('home/season/' . $object->slug . '?ref=' . urlencode($ref));
				break;
			case 'category':
				redirect('home/category/' . $object->slug . '?ref=' . urlencode($ref));
				break;
			default:
				show_404();
		}
	}

	public function user_avatar_markup()
	{
		header('Content-Type: application/javascript');
		$user = emflx_current_user(true);
		if (!$user) {
			// Not logged in, show login button
			$markup = $this->load->view('login_btn', array(
				'app_id' => $this->config->item('fb_app_id'),
				'app_version' => $this->config->item('fb_accountkit_version')
			), true);
		} else {
			// User is logged in, show user avatar
			$markup = $this->load->view('banner_avatar', array('user' => $user), true);
		}

		$this->load->view('jsonp', array('data' => $markup, 'fn' => 'setUserAvatar'));
	}
}
