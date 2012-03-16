<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}

	function index()
	{
		//TODO: This will show a list of all admin functions
		echo "This will show a list of all admin functions";
	} 

}