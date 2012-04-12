<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Machinebrands extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}

	function showsuccess()
	{
		$this->session->set_flashdata('success',date('Y-m-d H:i:s'));
		redirect('machinebrands');
	}

	function index()
	{
		//TODO: This is the default function. This should ideally list machine brands

		$mb = new Machinebrand();
		$mb->order_by('id','asc')->get();
		$data['machinebrands'] = $mb;
        $data['title'] = 'List of Machine Brands';
		$this->load->view('machinebrands/list',$data);
	}

	function view($machinebrandId = NULL)
	{
		// This is where we "view" a machine brand

		if($machinebrandId == NULL) show_error("You cannot access this page directly");

		$mb = new Machinebrand();
		$mb->get_by_id($machinebrandId);

		if(!$mb->exists()) show_error('The machine brand you are trying to view does not exist');

		$data['machinebrands'] = $mb;
		$data['title'] = 'Machine Brand';
		$data['number_of_machines'] = $mb->machinemodels->machines->count();
		$this->load->view('machinebrands/view',$data); // This is the details view
	}
	
	function create()
	{
		//TODO: We show the form and also create a machine brand here.
		$mb = new Machinebrand();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$mb->name = $this->input->post('name', TRUE); //Keep in mind that the optional TRUE parameter filters out XSS
			$mb->serial_number = $this->input->post('serial_number', TRUE);

			if($mb->save())
			{
				$this->session->set_flashdata('success', 'The Machine Brand was Successfully Created');
				redirect('machinebrands');
			}
			else
			{
				$data['errors'] = $mb->error;
			}
		}
		$data['machinebrands'] = $mb;
		$data['title'] = 'Create Machine Brand';
		//$data['heading']= 'Create Machine brand';
		$this->load->view('machinebrands/create',$data);
	}

	function edit($machinebrandId = NULL)
	{
		if($machinebrandId == NULL) show_error("You cannot access this page directly");

		$mb = new Machinebrand();
		$mb->get_by_id($machinebrandId);
		if(!$mb->exists()) show_error('The Machine Brand you are trying to edit does not exist');

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$mb->name = $this->input->post('name', TRUE);
			$mb->serial_number = $this->input->post('serial_number', TRUE);

			if($mb->save())
			{
				$this->session->set_flashdata('success', 'The Machine Brand was Successfully Updated');
				redirect($this->uri->uri_string());
			}
			else
			{
				$data['errors'] = $mb->error;
			}
		}
		$data['machinebrands'] = $mb;
		$data['title']= 'Edit machine brand';
		$this->load->view('machinebrands/edit',$data);
	}

	function delete($machinebrandId = NULL)
	{
		//TODO: Delete a machinebrand
		// Figure out first whether you are truly deleting or just hiding them.

		if($machinebrandId == NULL) show_error("You cannot access this page directly");

		// Case 1: Truly deleting
		$mb = new Machinebrand();
		$mb->get_by_id($machinebrandId);
		if(!$mb->exists()) show_error('The machine brand you are trying to delete does not exist');

		if($mb->delete())
		{
			$this->session->set_flashdata('success', 'The machine brand was successfully deleted');
			redirect('machinebrands');
		}
		else
		{
			$this->session->set_flashdata('errors', $mb->error->string);
			redirect('machinebrands');
		}


		/*// Case 2: Just hiding (using a field called "visible" as an example)
		$mb->visible = 0;
		if($mb->save())
		{
			$this->session->set_flashdata('success', 'The machine brand was successfully deleted');
			redirect('machinebrand');
		}
		else
		{
			$this->session->set_flashdata('errors', $mb->error->string);
			redirect('machinebrand');
		}*/
	}
	
}