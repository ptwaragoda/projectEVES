<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Machinemodels extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function showsuccess()
	{
		$this->session->set_flashdata('success',date('Y-m-d H:i:s'));
		redirect('machinemodels');
	}

	function index()
	{
		//TODO: This is the default function. This should ideally list customers

		$mm = new Machinemodel();
		$mm->order_by('id','asc')->get();

		//customers is the index name which could be any name and this name 
		//will become a variable in our view
		$data['machinemodels'] = $mm;
		$data['title'] = 'Machinemodel';

		//goes to the customer module and then list.php in the views folder
		$this->load->view('machinemodels/list',$data);
	}

	//reason we set the customerid to null is in case no id is passed to the page
	//we can control the error message
	function view($customerId = NULL)
	{
		// This is where we "view" a customer

		//$this->output->enable_profiler(TRUE); // This shows profile information.

		if($customerId == NULL) show_error("You cannot access this page directly");

		$c = new Customer();
		$c->get_by_id($customerId);
		//$c->where('id',$customerId)->get(); This is the same as above

		if(!$c->exists()) show_error('The customer you are trying to view does not exist');

		$data['title'] = 'Customer: '.$c->getFullName();
		$data['customer'] = $c;
		$data['transactions'] = $c->transactions->count();
		$this->load->view('customers/view',$data); // This is the details view
	}
	
	function create()
	{
		//TODO: We show the form and also create a customer here.
		$mm = new Machinemodel();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$mm->brand_name = $this->input->post('brand_name', TRUE); //Keep in mind that the optional TRUE parameter filters out XSS
			$mm->model_name = $this->input->post('model_name', TRUE);			

			if($mm->save())
			{
				$this->session->set_flashdata('success', 'The Machine model was successfully created');
				redirect('machinemodels');
			}
			else
			{
				$data['errors'] = $mm->error;
			}
		}
		$data['machinmodel'] = $mm;
		$data['title']= 'Create Machine model';
		$this->load->view('machinemodels/create',$data);
	}

	function edit($customerId = NULL)
	{
		//TODO: This should edit a given customer
		if($customerId == NULL) show_error("You cannot access this page directly");

		$c = new Customer();
		$c->get_by_id($customerId);
		if(!$c->exists()) show_error('The customer you are trying to edit does not exist');

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$c->first_name = $this->input->post('first_name', TRUE);
			$c->last_name = $this->input->post('last_name', TRUE);
			$c->email = $this->input->post('email', TRUE);
			$c->company = $this->input->post('company', TRUE);
			$c->phone = $this->input->post('phone', TRUE);

			if($c->save())
			{
				$this->session->set_flashdata('success', 'The customer was successfully updated');
				redirect($this->uri->uri_string());
			}
			else
			{
				$data['errors'] = $c->error;
			}
		}
		$data['customer'] = $c;
		$data['heading']= 'Edit Customer';
		$this->load->view('customers/edit',$data);
	}

	function delete($customerId = NULL)
	{
		//TODO: Delete a customer
		// Figure out first whether you are truly deleting or just hiding them.

		if($customerId == NULL) show_error("You cannot access this page directly");

		// Case 1: Truly deleting
		$c = new Customer();
		$c->get_by_id($customerId);
		if(!$c->exists()) show_error('The customer you are trying to delete does not exist');

		if($c->delete())
		{
			$this->session->set_flashdata('success', 'The customer was successfully deleted');
			redirect('customers');
		}
		else
		{
			$this->session->set_flashdata('errors', $c->error->string);
			redirect('customers');
		}


		/*// Case 2: Just hiding (using a field called "visible" as an example)
		$c->visible = 0;
		if($c->save())
		{
			$this->session->set_flashdata('success', 'The customer was successfully deleted');
			redirect('customers');
		}
		else
		{
			$this->session->set_flashdata('errors', $c->error->string);
			redirect('customers');
		}*/
	}
	
}