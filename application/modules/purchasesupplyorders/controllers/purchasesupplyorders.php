<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Purchasesupplyorders extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function showsuccess()
	{
		$this->session->set_flashdata('success',date('Y-m-d H:i:s'));
		redirect('purchasesupplyorder');
	}

	function index()
	{
		//TODO: This is the default function. This should ideally list customers

		$p = new Purchasesupplyorder();
		$p->order_by('payment_status','desc')->get();
		$data['purchasesupplyorders'] = $p;

		$this->load->view('purchasesupplyorders/list',$data);
	}

	function view($purchasesupplyorderId = NULL)
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
	
	function create()
	{
		//TODO: We show the form and also create a customer here.
		$p = new Customer();
		$s = new Purchasesupplyorder();
		$sitem = new Supplyitem();
		$sup = new Supply();

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$s->start_date = $this->input->post('start_date', TRUE); //Keep in mind that the optional TRUE parameter filters out XSS
			$s->end_date = $this->input->post('end_date', TRUE);
			$s->payment_status = $this->input->post('payment_status', TRUE);
			$sitem->quantity = $this->input->post('quantity', TRUE);
			$sup->description = $this->input->post('description', TRUE);
			$sup->price = $this->input->post('price', TRUE);
			//phone in () should be match with the id of the lable that is used to input the phone number in crete.php file


			if($s->save()&&$sup->save()&&$sitem->save())
			{
				$this->session->set_flashdata('success', 'The customer was successfully created');
				//redirect('customers/edit/'.$p->id);
			}
			else
			{
				$data['errors'] = $s->error;
			}
		}
		$data['purchasesupplyorder'] = $s;
		$data['supply'] = $sup;
		$data['Supplyitem']=$sitem;
		$data['heading']= 'Create Customer';
		$this->load->view('purchasesupplyorders/create',$data);
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