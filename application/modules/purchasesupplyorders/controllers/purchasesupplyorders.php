<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Purchasesupplyorders extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}

	function index()
	{
		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());

		$p = new Purchasesupplyorder();

		if($u->is_agent())
		{
			$p->where_related_user('id', $u->id);
		}
		elseif($u->is_admin() || $u->is_manager())
		{
			$p->where('is_draft','0');
		}

		$p->include_related('user', 'username');
		$p->order_by('created_on','desc')->get();
		$data['purchasesupplyorders'] = $p;

		$this->load->view('purchasesupplyorders/list',$data);
	}

/*	function view($purchasesupplyorderId = NULL)
	{
		// This is where we "view" a customer

		if($purchasesupplyorderId == NULL) show_error("You cannot access this page directly");

		$c = new Purchasesupplyorder();
		$c->get_by_id($purchasesupplyorderId);
		//$c->where('id',$customerId)->get(); This is the same as above

		if(!$c->exists()) show_error('The customer you are trying to view does not exist');

		$data['customer'] = $c;
		$this->load->view('customers/view',$data); // This is the details view
	}
	*/
	function create()
	{
		//TODO: We show the form and also create a customer here.
		$p = new Purchasesupplyorder();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//prettyPrint($_POST);exit;
			//$p->created_on = $this->input->post('created_on', TRUE);
			//$p->user_id = $this->input->post('user_id', TRUE);
			$p->total = $this->input->post('total', TRUE);
			$p->final_total = $this->input->post('tax', TRUE);
			$p->is_draft = 1;
			$p->user_id = $this->tank_auth->get_user_id();

			$relatedObjects = array();


		

			if($t->save($relatedOjbects))
			{
				$this->session->set_flashdata('success', 'The purchase supply order was successfully created');
				redirect('Purchasesupplyorders');
			}
			else
			{
				$data['errors'] = $t->error;
			}
		}
		
		$c = new Customer();
		$c->order_by('first_name','asc')->get();
		$data['customers'] = $c;

		$data['Purchasesupplyorder'] = $t;
		$data['title']= 'Create Purchase Supply Order';
		$this->load->view('Purchasesupplyorders/create',$data);
	}
//changed up to here 
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