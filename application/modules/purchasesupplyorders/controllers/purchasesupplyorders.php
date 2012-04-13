<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Purchasesupplyorders extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}

	function index() //Not drafts, waiting till they are changed to is_paid
	{
		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());
		$data['user'] = $u;

		$p = new Purchasesupplyorder();

		if($u->is_agent())
		{
			$p->where_related_user('id', $u->id);
		}

		$p->where('is_draft','0');
		$p->where('is_paid','0');

		$p->include_related('user', 'username');
		$p->order_by('created_on','desc')->get();
		$data['purchasesupplyorders'] = $p;

		$this->load->view('purchasesupplyorders/pending',$data);
	}

	function drafts() // Drafts
	{
		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());

		if($u->is_admin() || $u->is_manager() || !$u->is_agent()) show_error('You cannot access this page');

		$p = new Purchasesupplyorder();
		$p->where_related_user('id', $u->id);
		$p->where('is_draft','1');

		$p->include_related('user', 'username');
		$p->order_by('created_on','desc')->get();
		$data['purchasesupplyorders'] = $p;

		$this->load->view('purchasesupplyorders/drafts',$data);
	}

	function archive() // Orders that are "is_paid"
	{
		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());

		$p = new Purchasesupplyorder();

		if($u->is_agent())
		{
			$p->where_related_user('id', $u->id);
		}

		$p->where('is_paid','1');

		$p->include_related('user', 'username');
		$p->order_by('created_on','desc')->get();
		$data['purchasesupplyorders'] = $p;

		$this->load->view('purchasesupplyorders/archive',$data);
	}

	function create()
	{
		$p = new Purchasesupplyorder();
		$p->total = 0;
		$p->final_total = 0;
		$p->is_draft = 1;
		$p->user_id = $this->tank_auth->get_user_id();
		$p->save();
		$this->session->set_flashdata('success', 'The purchase supply order was successfully created');
		redirect('purchasesupplyorders/view/'.$p->id);
	}

	function view($id = NULL)
	{
		if($id == NULL) show_error("You cannot access this page directly");

		$p = new Purchasesupplyorder();
		$p->get_by_id($id);
		if(!$p->exists()) show_error('The purchase supply order you are trying to view does not exist');

		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());
		$data['user'] = $u;

		if($u->is_agent() && $p->user_id != $this->tank_auth->get_user_id()) show_error('You do not have access to view this transaction');

		if($p->is_draft && ($u->is_admin() || $u->is_manager())) show_error('This supply order is still in draft mode and cannot be processed');

		$s = new Supply();
		$s->order_by('name','asc')->get();
		$data['supplies'] = $s;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$relatedObjects = array();

			$relatedObjects[] = $p;

			$supply = new Supply();
			$supply->get_by_id($this->input->post('supply'));

			if($supply->exists()) $relatedObjects[] = $supply;

			$sl = new supplyitem();
			$sl->price = $supply->price;

			if($sl->save($relatedObjects))
			{
				$output = $this->_adjustTotal($p->id);

				if($output['status']== 'error') $this->session->set_flashdata('error',$output['message']);

				$this->session->set_flashdata('success','Line Item successfully added');
				redirect(current_url());
			}
			else
			{
				$data['errors'] = $sl->error->string;
			}

		}

		$lineItems = new supplyitem();
		$lineItems->include_related('supply', 'name');
		$lineItems->where_related_purchasesupplyorder('id',$p->id);
		$lineItems->order_by('id','asc');
		$lineItems->get();

		$data['title'] = 'Purchase Supply Order: '.$p->id;
		$data['order'] = $p;
		$data['lineItems'] = $lineItems;
		$this->load->view('purchasesupplyorders/view',$data);
	}
	
	private function _adjustTotal($id = NULL)
	{
		if($id == NULL) return array('status'=>'error', 'message' => 'The transaction ID cannot be null');

		$p = new Purchasesupplyorder();
		$p->get_by_id($id);
		if(!$p->exists()) return array('status'=>'error', 'message' => 'The supply order does not exist');

		if($p->user_id != $this->tank_auth->get_user_id()) return array('status'=>'error', 'message' => 'The transaction does not belong to you');

		$supplyitems = $p->supplyitem->get();
		$total = 0;

		foreach($supplyitems->all as $sl)
		{
			$total += $sl->price;
		}

		$p->final_total = $total;
		if($p->save())
		{
			return array('status'=>'success');
		}
		else
		{
			return array('status'=>'error', 'message' => $p->error->string);
		}
		
	}

	function finalize($id = NULL)
	{
		if($id == NULL) show_error('You cannot access this page directly');

		$p = new Purchasesupplyorder();
		$p->get_by_id($id);
		if(!$p->exists()) show_error('The purchase supply order you are trying to access does not exist');

		$p->is_draft = 0;

		$p->save();

		$data['order'] = $p;
		$this->_send_email($data);

		redirect('purchasesupplyorders/view/'.$p->id);
	}

	/*function fakefinalise($id)
	{
		$p = new Purchasesupplyorder();
		$p->get_by_id($id);

		$data['order'] = $p;
		$this->_send_email($data);
	}*/

	function _send_email(&$data)
	{
		//echo $this->load->view('email/notification-html', $data, TRUE);exit;
		$this->load->library('email');
		$this->email->from('ptwaragoda@learn.senecac.on.ca');
		$this->email->reply_to('thilanka555@gmail.com');
		$this->email->to('thilanka555@gmail.com');
		$this->email->subject('Purchase Supply Order Created');
		$this->email->message($this->load->view('email/notification-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/notifications-txt', $data, TRUE));
		$this->email->send();
	}

	function processPayment($id = NULL)
	{
		if($id == NULL) show_error('You cannot access this page directly');

		$p = new Purchasesupplyorder();
		$p->get_by_id($id);
		if(!$p->exists()) show_error('The purchase supply order you are trying to access does not exist');

		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());

		if(!$u->is_manager() && !$u->is_admin()) show_error('You cannot access this feature');

		$p->is_paid = 1;

		$p->save();

		redirect('purchasesupplyorders/view/'.$p->id);
	}

	function deleteLineItem($lineItemId = NULL)
	{
		if($lineItemId == NULL) show_error('You cannot access this page directly');

		$l = new Supplyitem();
		$l->get_by_id($lineItemId);
		if(!$l->exists()) show_error('The line item you are trying to delete does not exist');

		$order = $l->purchasesupplyorder->get();

		if($order->user_id != $this->tank_auth->get_user_id()) show_error('The line item that you are trying to delete does not belong to you');

		if($l->delete())
		{
			$output = $this->_adjustTotal($order->id);

			if($output['status'] == 'error') $this->session->set_flashdata('error',$output['message']);

			$this->session->set_flashdata('success', 'The supply line item was successfully deleted');
		}
		else
		{
			$this->session->set_flashdata('errors', $l->error->string);
		}
		redirect('purchasesupplyorders/view/'.$order->id);
	}


	function delete($id = NULL)
	{
		$p = new Purchasesupplyorder();
		if($id == NULL) show_error("You cannot access this page directly");
		
		$p->get_by_id($id);
		if(!$p->exists()) show_error('The purchase supply order you are trying to delete does not exist');

		if($p->is_draft!=1) show_error('You cannot delete a purchase supply order that is not in draft mode');

		if($p->delete())
		{
			$this->session->set_flashdata('success', 'The purchase supply order was successfully deleted');
			redirect('purchasesupplyorders');
		}
		else
		{
			
			$this->session->set_flashdata('errors', $p->error->string);
			redirect('purchasesupplyorders');
		}
	}
	
}