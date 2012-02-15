<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Transactions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}

	function index()
	{
		$t = new Transaction();
		$t->where_related_user('id',$this->tank_auth->get_user_id())->order_by('created_on','desc');

		$customerTitle = '';

		$customerId = $this->input->get('customer');
		if($customerId)
		{
			$c = new Customer();
			$c->get_by_id($customerId);
			if($c->exists())
			{
				$t->where_related_customer('id',$customerId);
				$data['customer'] = $c;
				$customerTitle = ' for '.$c->getFullName();
			}
		}

		$t->get();

		$data['transactions'] = $t;
		$data['title'] = 'Transactions'.$customerTitle;

		$this->load->view('transactions/list',$data);
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
		$t = new Transaction();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//prettyPrint($_POST);exit;
			$t->trans_date = $this->input->post('trans_date', TRUE);
			$t->start_date = $this->input->post('start_date', TRUE);
			$t->end_date = $this->input->post('end_date', TRUE);
			$t->tax = $this->input->post('tax', TRUE);

			$relatedObjects = array();

			$c = new Customer();
			$c->get_by_id($this->input->post('customer', TRUE));
			if($c->exists()) $relatedOjbects[] = $c;

			$u = new User();
			$u->get_by_id($this->tank_auth->get_user_id());
			$relatedOjbects[] = $u;

			if($t->save($relatedOjbects))
			{
				$this->session->set_flashdata('success', 'The trasaction was successfully created');
				redirect('transactions');
			}
			else
			{
				$data['errors'] = $t->error;
			}
		}
		
		$c = new Customer();
		$c->order_by('first_name','asc')->get();
		$data['customers'] = $c;

		$data['transaction'] = $t;
		$data['title']= 'Create Transaction';
		$this->load->view('transactions/create',$data);
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