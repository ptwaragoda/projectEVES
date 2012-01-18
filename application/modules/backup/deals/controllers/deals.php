<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Deals extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function view($dealId = NULL)
	{
		if($dealId == NULL) show_error('You cannot access this page directly');

		$d = new Deal();
		$d->get_by_id($dealId);
		if(!$d->exists()) show_error('The deal you are trying to view does not exist');
		
		$deals = new Deal();
		$deals->where('dealstatus_id','2')->where('id !=',$d->id)->where_related_category('id',$d->category_id)->order_by('end_date','desc')->get(4);
		$data['deals'] = $deals;
		
		$data['meta'] = array(
			array('name' => 'robots', 'content' => 'no-cache'),
			array('name' => 'description', 'content' => $d->short_description),
			array('name' => 'keywords', 'content' => $d->meta_keywords),
		);
		
		$data['deal'] = $d;
		$data['scripts'][] = base_url().'public/js/dealView.js';
		$data['heading'] = 'Deal';
		$this->load->view('deals/view',$data);
	}
}
