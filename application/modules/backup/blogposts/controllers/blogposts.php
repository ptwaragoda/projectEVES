<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Blogposts extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$p = new Blogpost();
		$p->get();
		$data['posts'] = $p;
		$this->load->view('homepage',$data);
	}
	
	function view($post_id = NULL)
	{
		if($post_id == NULL) show_error("you cannot access this page directly");

		$p = new Blogpost();
		$p->get_by_id($post_id);
		if(!$p->exists()) show_error('the post you are trying to access does not exist');

		$data['post'] = $p;
		$this->load->view('blogposts/view',$data);
	}
}