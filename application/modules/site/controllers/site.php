<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}

	function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('homepage',$data);
	}

	//Testing example
	function test()
	{
		$this->load->library('unit_test');

		$u = new User();
		$u->get_by_id(1);

		$test = $u->is_admin();

		$expected_result = TRUE;

		$test_name = 'User "Hasitha" should be an admin';

		echo $this->unit->run($test, $expected_result, $test_name);
	}

	/*function home()
	{
		$userId = $this->tank_auth->get_user_id();
		$username = $this->tank_auth->get_username();

		echo "$username has the id $userId";
	}

	function greeting($name=NULL,$lastname=NULL)
	{
		if($name == NULL || $lastname == NULL) show_error('You cannot access this page directly');
		echo 'hello '.$name.' '.$lastname;
	}

	function index2()

		//$	{ = new Blogpost();
		//$p->get();
		//$data['posts'] = $p;
		$data['posts']="Welcome to the EVEs system";
		$data['msg']="Please choose the following:";
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
	*/
	
}