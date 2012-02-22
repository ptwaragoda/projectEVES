<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Supplies extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function showsuccess()
	{
		$this->session->set_flashdata('success',date('Y-m-d H:i:s'));
		redirect('supplies');
	}

	function index()
	{
		//TODO: This is the default function. This should ideally list supplies

		$s = new Supply();
		$s->order_by('id','asc')->get();

		//supplies is the index name which could be any name and this name 
		//will become a variable in our view
		$data['supplies'] = $s;
		$data['title'] = 'Supplies';

		//goes to the customer module and then list.php in the views folder
		$this->load->view('supplies/list',$data);
	}

	//reason we set the customerid to null is in case no id is passed to the page
	//we can control the error message


	// function view($customerId = NULL)
	// {
	// 	// This is where we "view" a customer

	// 	//$this->output->enable_profiler(TRUE); // This shows profile information.

	// 	if($customerId == NULL) show_error("You cannot access this page directly");

	// 	$c = new Customer();
	// 	$c->get_by_id($customerId);
	// 	//$c->where('id',$customerId)->get(); This is the same as above

	// 	if(!$c->exists()) show_error('The customer you are trying to view does not exist');

	// 	$data['title'] = 'Customer: '.$c->getFullName();
	// 	$data['customer'] = $c;
	// 	$data['transactions'] = $c->transactions->count();
	// 	$this->load->view('supplies/view',$data); // This is the details view
	// }
	
	function create()
	{
		//TODO: We show the form and also create a customer here.
		$s = new Supply();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$s->name = $this->input->post('name', TRUE); //Keep in mind that the optional TRUE parameter filters out XSS
			$s->price = $this->input->post('price', TRUE);
			
			//price in () should be match with the id of the lable that is used to input the phone number in crete.php file
			

			if($s->save())
			{
				$this->session->set_flashdata('success', 'The supply was successfully created');
				redirect('supplies');
			}
			else
			{
				$data['errors'] = $s->error;
			}
		}
		$data['supply'] = $s;
		$data['title']= 'Create Supply';
		$this->load->view('supplies/create',$data);
	}

	function edit($supplyId= NULL)
	{
		//TODO: This should edit a given customer
		if($supplyId== NULL) show_error("You cannot access this page directly");

		$s = new Supply();
		$s->get_by_id($supplyId);
		if(!$s->exists()) show_error('The supply you are trying to edit does not exist');

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$s->name = $this->input->post('name', TRUE);
			$s->price = $this->input->post('price', TRUE);

			if($s->save())
			{
				$this->session->set_flashdata('success', 'The Supply was successfully updated');
				redirect($this->uri->uri_string());
			}
			else
			{
				$data['errors'] = $s->error;
			}
		}
		$data['supply'] = $s;
		$data['heading']= 'Edit Supply';
		$this->load->view('supplies/edit',$data);
	}

	function delete($supplyId= NULL)
	{
		//TODO: Delete a customer
		// Figure out first whether you are truly deleting or just hiding them.

		if($supplyId== NULL) show_error("You cannot access this page directly");

		// Case 1: Truly deleting
		
		$s = new Supply();
		$s->get_by_id($supplyId);
		if(!$s->exists()) show_error('The Supply you are trying to delete does not exist');

		if($s->delete())
		{
			$this->session->set_flashdata('success', 'The supply was successfully deleted');
			redirect('supplies');
		}
		else
		{
			$this->session->set_flashdata('errors', $s->error->string);
			redirect('supplies');
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