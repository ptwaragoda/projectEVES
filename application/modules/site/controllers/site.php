<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function home()
	{
		echo "This is the home page";
	}

	function greeting($name=NULL,$lastname=NULL)
	{
		if($name == NULL || $lastname == NULL) show_error('You cannot access this page directly');
		echo 'hello '.$name.' '.$lastname;
	}
	
	function index()
	{
		$p = new Blogpost();
		$p->get();
		$data['posts'] = $p;
		$this->load->view('homepage',$data);
	}

	function createDummyPost()
	{
		$p = new Blogpost();
		$p->title = 'Hello World';
		$p->description = 'blah blah blah blah';
		$p->save();
		redirect('site/index');
	}

	function editDummyPost()
	{
		$p = new Blogpost();
		$p->get_by_id(1);
		if(!$p->exists()) show_error('The post you are trying to edit does not exist');

		$p->title = 'hey';
		$p->save();

		redirect('site/index');
	}
	
	
}