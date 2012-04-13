<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Transactions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
		
	}

	function index()
	{
		//$this->output->enable_profiler(TRUE);
		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());
		
		
		if($u->is_agent())
		{
			$t = new Transaction();
			$t->where_related_user('id',$this->tank_auth->get_user_id())->where('is_draft','0')->order_by('created_on','desc');
		}
		else
		{
			$t = new Transaction();
			$t->where('is_draft','0')->order_by('created_on','desc');
		}

			$dt = new Transaction();
			$dt->where_related_user('id',$this->tank_auth->get_user_id())->where('is_draft','1')->order_by('created_on','desc');
		
		$customerTitle = '';

		$customerId = $this->input->get('customer');
		if($customerId)
		{
			$c = new Customer();
			$c->get_by_id($customerId);
			if($c->exists())
			{
				$t->where_related_customer('id',$customerId);
				$dt->where_related_customer('id',$customerId);

				$data['customer'] = $c;
				$customerTitle = ' for '.$c->getFullName();
			}
		}

		$t->get();
		$dt->get();

		$data['transactions'] = $t;
		$data['drafttransactions'] = $dt;
		$data['title'] = 'Transactions'.$customerTitle;

		$this->load->view('transactions/list',$data);
	}

	function view($transactionId = NULL)
	{
		if($transactionId == NULL) show_error("You cannot access this page directly");

		$t = new Transaction();
		$t->get_by_id($transactionId);
		if(!$t->exists()) show_error('The transaction you are trying to view does not exist');

		if($t->user_id != $this->tank_auth->get_user_id()) show_error('You do not have access to view this transaction');

		$currentMachines = new Machine();
		$currentMachines->where_related('machinelineitem/transaction', 'id', $t->id)->get();

		$currentMachinesArray = array();
		foreach($currentMachines->all as $m)
		{
			$currentMachinesArray[] = $m->id;
		}

		$u = new User();
			$u->get_by_id($this->tank_auth->get_user_id());

		$m = new Machine();
		if($u->is_agent())
			$m->where_related_user('id', $u->id);
		if(count($currentMachinesArray))
		{
			$m->group_start(); 
			$m->where_not_in('id', $currentMachinesArray);
			$m->group_end();
		}
		$m->where_related_status('id','1')->order_by('name','asc')->get();
		$data['machines'] = $m;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$relatedObjects = array();

			$relatedObjects[] = $t;

			$machine = new Machine();
			$machine->where_related_status('id','1');
			$machine->where('id',$this->input->post('machine'));
			$machine->get();
			if($machine->exists()) $relatedObjects[] = $machine;

			$ml = new Machinelineitem();
			$ml->price = $this->input->post('price');

			if($ml->save($relatedObjects))
			{
				$output = $this->_adjustTotal($t->id);

				if($output['status']== 'error') $this->session->set_flashdata('error',$output['message']);

				$this->session->set_flashdata('success','Machine Line Item successfully added');
				redirect(current_url());
			}
			else
			{
				$data['errors'] = $ml->error->string;
			}

		}

		$lineItems = new Machinelineitem();
		$lineItems->include_related('machine', 'name');
		$lineItems->include_related('machine/machinemodel', 'name');
		$lineItems->include_related('machine/machinemodel/machinebrand', 'name');
		$lineItems->where_related_transaction('id',$t->id);
		$lineItems->order_by('created_on','asc');
		$lineItems->get();

		$data['title'] = 'Transaction: '.$t->id;
		$data['transaction'] = $t;
		$data['lineItems'] = $lineItems;
		$this->load->view('transactions/view',$data);
	}
	
	private function _adjustTotal($transactionId = NULL)
	{
		//TODO: This is where we will adjust the total of the transaction

		if($transactionId == NULL) return array('status'=>'error', 'message' => 'The transaction ID cannot be null');

		$t = new Transaction();
		$t->get_by_id($transactionId);
		if(!$t->exists()) return array('status'=>'error', 'message' => 'The transaction does not exist');

		if($t->user_id != $this->tank_auth->get_user_id()) return array('status'=>'error', 'message' => 'The transaction does not belong to you');

		$machinelineitems = $t->machinelineitem->get();
		$total = 0;

		foreach($machinelineitems->all as $ml)
		{
			$total += $ml->price;
		}

		$t->final_total = $total;
		if($t->save())
		{
			return array('status'=>'success');
		}
		else
		{
			return array('status'=>'error', 'message' => $t->error->string);
		}
		
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
			$t->is_draft = 1;

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
		
		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());
		
		$c = new Customer();
		$c->where('visible','1');

		if($u->is_agent())
			$c->where_related_user('id', $u->id); // filters the customers

		$c->order_by('first_name','asc')->get();
		$data['customers'] = $c;

		$data['transaction'] = $t;
		$data['title']= 'Create Transaction';
		$this->load->view('transactions/create',$data);
	}

	function deleteLineItem($lineItemId = NULL)
	{
		if($lineItemId == NULL) show_error('You cannot access this page directly');

		$l = new Machinelineitem();
		$l->get_by_id($lineItemId);
		if(!$l->exists()) show_error('The line item you are trying to delete does not exist');

		$transaction = $l->transaction->get();

		if($transaction->user_id != $this->tank_auth->get_user_id()) show_error('The line item that you are trying to delete does not belong to you');

		if($l->delete())
		{
			$output = $this->_adjustTotal($transaction->id);

			if($output['status']== 'error') $this->session->set_flashdata('error',$output['message']);

			$this->session->set_flashdata('success', 'The machine line item was successfully deleted');
		}
		else
		{
			$this->session->set_flashdata('errors', $l->error->string);
		}
		redirect('transactions/view/'.$transaction->id);
	}
// There is no edit facility for transaction. If they need to change something, they have to delete it and start from scracth
/*	function edit($customerId = NULL)
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
*/
	function finalize($transactionId = NULL)
	{
		if($transactionId == NULL) show_error('You cannot access this page directly');

		$t = new Transaction();
		$t->get_by_id($transactionId);
		if(!$t->exists()) show_error('The transaction you are trying to access does not exist');

		$t->is_draft = 0;

		$t->save();

		redirect('transactions/view/'.$t->id);
	}

	function processPayment($transactionId = NULL)
	{
		if($transactionId == NULL) show_error('You cannot access this page directly');

		$t = new Transaction();
		$t->get_by_id($transactionId);
		if(!$t->exists()) show_error('The transaction you are trying to access does not exist');

		$t->is_paid = 1;

		$t->save();

		redirect('transactions/view/'.$t->id);
	}

//transaction delete should be if it is in draft, then delete. otherwise set the visibility to 0.

	function delete($transactionId = NULL)
	{
		//TODO: Delete a transaction
		// Figure out first whether you are truly deleting or just hiding them.
		$t = new Transaction();
		if($transactionId == NULL) show_error("You cannot access this page directly");

		// Case 1: Truly deleting
		
		$t->get_by_id($transactionId);
		if(!$t->exists()) show_error('The transaction you are trying to delete does not exist');

		if($t->is_draft!=1) show_error('You cannot delete a transaction that is not in draft mode');

		if($t->delete())
		{
			$this->session->set_flashdata('success', 'The transaction was successfully deleted');
			redirect('transactions');
		}
		else
		{
			
			$this->session->set_flashdata('errors', $t->error->string);
			redirect('transactions');
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