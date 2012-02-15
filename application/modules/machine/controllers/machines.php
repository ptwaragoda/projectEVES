<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Machines extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function showsuccess()
	{
		$this->session->set_flashdata('success',date('Y-m-d H:i:s'));
		redirect('machines');
	}

	function index()
	{
		//TODO: This is the default function. This should ideally list machines 

		$m = new Machine();
		$m->order_by('id','asc')->get();
		$data['machines'] = $m;
        $data['title'] = 'List of Machines';
		$this->load->view('machines/list',$data);
	}

	function view($machineId = NULL)
	{
		// This is where we "view" a machine 

		if($machineId == NULL) show_error("You cannot access this page directly");

		$m = new Machine();
		$m->get_by_id($machineId);

		if(!$m->exists()) show_error('The machine you are trying to view does not exist');

		$data['machines'] = $m;
		$data['title'] = 'Machine';
		$data['numer_of_machines'] = $m->machines->count();
		$this->load->view('machines/view',$data); // This is the details view
	}
	
	function create()
	{
		//TODO: We show the form and also create a machine here.
		$m = new Machine();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$m->machine_brand_name = $this->input->post('machine_brand_name', TRUE); 
			$m->machine_model = $this->input->post('machine_model', TRUE);

			if($m->save())
			{
				$this->session->set_flashdata('success', 'The machine was successfully created');
				redirect('machines');
			}
			else
			{
				$data['errors'] = $m->error;
			}
		}
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

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$m->machine_brand_name = $this->input->post('machine_brand_name', TRUE);
			$m->machine_model = $this->input->post('machine_model', TRUE);

			if($m->save())
			{
				$this->session->set_flashdata('success', 'The Machine was successfully updated');
				redirect($this->uri->uri_string());
			}
			else
			{
				$data['errors'] = $m->error;
			}
		}
		$data['machines'] = $m;
		$data['title']= 'Edit Machine';
		$this->load->view('machines/edit',$data);
	}

	function delete($machineId = NULL)
	{
		//TODO: Delete a machine
		// Figure out first whether you are truly deleting or just hiding them.

		if($machineId == NULL) show_error("You cannot access this page directly");

		// Case 1: Truly deleting
		$m = new Machine();
		$m->get_by_id($machineId);
		if(!$m->exists()) show_error('The machine you are trying to delete does not exist');

		if($m->delete())
		{
			$this->session->set_flashdata('success', 'The machine was successfully deleted');
			redirect('machines');
		}
		else
		{
			$this->session->set_flashdata('errors', $m->error->string);
			redirect('machines');
		}


		/*// Case 2: Just hiding (using a field called "visible" as an example)
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
		}*/
	}
	
}