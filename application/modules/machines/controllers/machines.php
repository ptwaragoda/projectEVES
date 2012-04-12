<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Machines extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}

	function index()
	{
		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());
		$data['user'] = $u;

		$m = new Machine();
		$m->include_related('status',array('name'));
		$m->include_related('user',array('username'));
		$m->include_related('machinemodel',array('name'));
		if($u->is_agent())
			$m->where_related_user('id',$u->id);
		$m->order_by('id','asc')->get();
		$data['machines'] = $m;

        $data['title'] = 'List of Machines';
		$this->load->view('machines/list',$data);
	}

	function assign($id = NULL)
	{
		if($id == NULL) show_error("You cannot access this page directly");

		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());
		if(!$u->is_admin() && !$u->is_manager()) show_error('You cannot perform this action');

		$agents = new User();
		$agents->where('group_id', '3')->order_by('username','asc')->get();
		$data['agents'] = $agents;
		
		$m = new Machine();
		$m->get_by_id($id);
		if(!$m->exists()) show_error('The machine you are trying to assign does not exist');

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$agent = new User();
			$agent->get_by_id($this->input->post('agent'));
			if(!$agent->exists()) show_error('The agent you are trying to assign this machine to does not exist');

			$m->save($agent);
			$this->session->set_flashdata('success', 'Machine succesfully assigned');
			redirect('machines');
		}
		
		$data['machine'] = $m;
		$data['title'] = 'Assign machine';
		$this->load->view('machines/assign',$data);
	}

	function view($machineId = NULL)
	{
		// This is where we "view" a machine 

		if($machineId == NULL) show_error("You cannot access this page directly");

		$m = new Machine();
		$m->include_related('status',array('name'));
		$m->include_related('machinemodel',array('name'));
		$m->get_by_id($machineId);

		if(!$m->exists()) show_error('The machine you are trying to view does not exist');

		$data['machines'] = $m;
		$data['title'] = 'Machine';
		$this->load->view('machines/view',$data); // This is the details view
	}
	
	function create()
	{
		//TODO: We show the form and also create a machine here.
		$m = new Machine();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$m->name = $this->input->post('name', TRUE);
			$m->cover_square_feet = $this->input->post('cover_square_feet', TRUE);
			$m->purchase_date = $this->input->post('purchase_date', TRUE);
			$m->serial_num = $this->input->post('serial_num', TRUE);
			
			//Relationships
			$relatedObjects = array();

			$s = new Status();
			$s->get_by_id($this->input->post('status', TRUE));
			if($s->exists()) $relatedObjects[] = $s;

			$mm = new Machinemodel();
			$mm->get_by_id($this->input->post('machinemodel', TRUE));
			if($mm->exists()) $relatedObjects[] = $mm;

			if($m->save($relatedObjects))
			{
				$this->session->set_flashdata('success', 'The machine was successfully created');
				redirect('machines');
			}
			else
			{
				$data['errors'] = $m->error;
			}
		}

		$statuses = new Status();
		$statuses->where('type','1');
		$statuses->get();
		$data['statuses'] = $statuses;

		$models = new Machinemodel();
		$models->include_related('machinebrand',array('name'));
		$models->order_by('name','asc')->get();
		$data['machinemodels'] = $models;

		$data['machines'] = $m;
		$data['title'] = 'Create Machine';
		$this->load->view('machines/create',$data);
	}

	function edit($machineId = NULL)
	{
		//TODO: This should edit a given machine
		if($machineId == NULL) show_error("You cannot access this page directly");

		$m = new Machine();
		$m->get_by_id($machineId);
		if(!$m->exists()) show_error('The Machine you are trying to edit does not exist');

		$mm = new Machinemodel();
		$mm->order_by('name','asc')->get();
		$data['models'] = $mm;

		$statuses = new Status();
		$statuses->get();
		$data['statuses'] = $statuses;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$m->name = $this->input->post('name', TRUE);
			$m->cover_square_feet = $this->input->post('cover_square_feet', TRUE);
			$m->purchase_date = $this->input->post('purchase_date', TRUE);
			$m->serial_num = $this->input->post('serial_num', TRUE);
			
			//Relationships
			$relatedObjects = array();

			$s = new Status();
			$s->get_by_id($this->input->post('status', TRUE));
			if($s->exists()) $relatedObjects[] = $s;

			$mm = new Machinemodel();
			$mm->get_by_id($this->input->post('model', TRUE));
			if($mm->exists()) $relatedObjects[] = $mm;

			if($m->save($relatedObjects))
			{
				$this->session->set_flashdata('success', 'The Machine was successfully updated');
				redirect(current_url());
			}
			else
			{
				$data['errors'] = $m->error;
			}
		}
		$data['machine'] = $m;
		$data['title']= 'Edit Machine';
		$this->load->view('machines/edit',$data);
	}

	function delete($machineId = NULL)
	{

		if($machineId == NULL) show_error("You cannot access this page directly");

		$m = new Machine();
		$m->get_by_id($machineId);
		if(!$m->exists()) show_error('The machine you are trying to delete does not exist');

		$m->visible = 0;
		if($m->save())
		{
			$this->session->set_flashdata('success', 'The machine was successfully deleted');
			redirect('machine');
		}
		else
		{
			$this->session->set_flashdata('errors', $m->error->string);
			redirect('machine');
		}
	}

}