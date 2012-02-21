<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Customers extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}

	function showsuccess()
	{
		$this->session->set_flashdata('success',date('Y-m-d H:i:s'));
		redirect('customers');
	}

	function index()
	{
		//TODO: This is the default function. This should ideally list customers

		$c = new Customer();
		$c->order_by('created_on','desc')->get();

		//customers is the index name which could be any name and this name 
		//will become a variable in our view
		$data['customers'] = $c;
		$data['title'] = 'Customers';

		//goes to the customer module and then list.php in the views folder
		$this->load->view('customers/list',$data);
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
		$c = new Customer();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$c->first_name = $this->input->post('first_name', TRUE); //Keep in mind that the optional TRUE parameter filters out XSS
			$c->last_name = $this->input->post('last_name', TRUE);
			$c->email = $this->input->post('email', TRUE);
			$c->company = $this->input->post('company', TRUE);
			$c->company_address = $this->input->post('company_address', TRUE);
			//phone in () should be match with the id of the lable that is used to input the phone number in crete.php file
			$c->phone = $this->input->post('phone', TRUE);
			$c->email = $this->input->post('email', TRUE);
			//$c->user_id=$this->tank_auth->get_user_id();
			$c->visible = 1;

			$relatedObjects = array();

			$u= new User();
			$u->get_by_id($this->tank_auth->get_user_id());
			if($u->exists()) $relatedObjects[] = $u; /// TODO: Discuss this with hasitha


			if($c->save($relatedObjects))
			{
				$this->session->set_flashdata('success', 'The customer was successfully created');
				redirect('customers');
			}
			else
			{
				$data['errors'] = $c->error;
			}
		}
		$data['customer'] = $c;
		$data['title']= 'Create Customer';
		$this->load->view('customers/create',$data);
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
			$c->first_name = $this->input->post('first_name', TRUE); //Keep in mind that the optional TRUE parameter filters out XSS
			$c->last_name = $this->input->post('last_name', TRUE);
			$c->email = $this->input->post('email', TRUE);
			$c->company = $this->input->post('company', TRUE);
			$c->company_address = $this->input->post('company_address', TRUE);
			//phone in () should be match with the id of the lable that is used to input the phone number in crete.php file
			$c->phone = $this->input->post('phone', TRUE);
			$c->email = $this->input->post('email', TRUE);
			//$c->user_id=$this->tank_auth->get_user_id();
			$c->visible = 1;

			$relatedObjects = array();

			$u= new User();
			$u->get_by_id($this->tank_auth->get_user_id());
			if($u->exists()) $relatedObjects[] = $u;

			if($c->save($relatedObjects))
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