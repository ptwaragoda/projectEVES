<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Usermanager extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');

		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());

		if(!$u->is_admin()) show_error('You do not have permission to access this page');
	}

	function index()
	{
		$users = new User();
		$users->where('id !=', $this->tank_auth->get_user_id())->get();
		$data['users'] = $users;

		$data['title'] = 'Manage Users';

		$this->load->view('usermanager/list',$data);
	}

	function assign($id = NULL)
	{
		if($id == NULL) show_error("You cannot access this page directly");

		$u = new User();
		$u->get_by_id($id);
		if(!$u->exists()) show_error('The user you are trying to assign does not exist');

		$groups = new Group();
		$groups->get();
		$data['groups'] = $groups;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$relatedObjects = array();

			$g = new Group();
			$g->get_by_id($this->input->post('group'));
			if(!$g->exists()) show_error('The group you are trying to assign the user to does not exist');

			$relatedObjects[] = $g;

			if($u->save($relatedObjects))
			{
				$this->session->set_flashdata('success','User was successfully assigned');
				redirect('usermanager');
			}
			else
			{
				$data['errors'] = $ml->error->string;
			}

		}

		$data['title'] = 'Assign user to group';
		$data['user'] = $u;
		$this->load->view('usermanager/assign',$data);
	}
	
}