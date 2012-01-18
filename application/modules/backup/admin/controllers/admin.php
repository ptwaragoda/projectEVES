<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}
	
	function index()
	{
		$total_deals = new Deal();
		$data['total_deals'] = $total_deals;

		$today = date('Y-m-d H:i:s');
		$active_deals = new Deal();
		$active_deals->where('start_date <=', $today)->where('end_date >=', $today)->where('dealstatus_id','1');
		$data['active_deals'] = $active_deals;

		$unpublished_deals = new Deal();
		$unpublished_deals->where('dealstatus_id','0');
		$data['unpublished_deals'] = $unpublished_deals;
		
		$data['heading'] = 'Dashboard';
		$this->load->view('admin/dashboard',$data);
	}

}