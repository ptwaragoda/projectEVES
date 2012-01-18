<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function view($stub = NULL)
	{
		if($stub == NULL) show_error('You cannot access this page directly');
		
		$c = new Category();
		$c->get_by_stub($stub);
		if(!$c->exists()) show_error('The category you are trying to access does not exist');
		
		$data['deals'] = $c->deals->where('dealstatus_id','2')->order_by('end_date','desc')->get(5);
		if(count($data['deals']->all) == 0) show_error('There are no deals in this category');
		$data['category'] = $c;
		
		$data['meta'] = array(
			array('name' => 'robots', 'content' => 'no-cache'),
			array('name' => 'description', 'content' => $data['deals']->short_description),
			array('name' => 'keywords', 'content' => $data['deals']->meta_keywords),
		);
		
		$data['scripts'][] = base_url().'public/js/dealView.js';
		$data['heading'] = $c->name.' Deals';
		$this->load->view('categories/view',$data);
	}
}