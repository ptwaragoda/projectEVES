<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class PageManager extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}
	
	function manage()
	{
		$p = new Page();
		$p->get();
		
		$data['pages'] = $p;
		$data['heading'] = 'Manage pages';
		$this->load->view('admin/pages/manage',$data);
	}

	function edit($pageId = NULL)
	{
		if($pageId == NULL) show_error('You cannot access this page directly');
		
		$p = new Page();
		$p->get_by_id($pageId);
		if(!$p->exists()) show_error('The page you are trying to edit does not exist');
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$p->title = $this->input->post('title',TRUE);
			$p->description = $this->input->post('description',TRUE);
			$p->meta_keywords = $this->input->post('meta_keywords',TRUE);
			$p->meta_description = $this->input->post('meta_description',TRUE);
			
			if($p->save())
			{
				$data['success'] = 'Page successfully updated';
			}
		}
		
		$data['page'] = $p;
		$data['heading'] = 'Editing: '.$p->title;
		$this->load->view('admin/pages/edit',$data);
	}
	
}