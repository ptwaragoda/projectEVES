<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Backups extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');

		$u = new User();
		$u->get_by_id($this->tank_auth->get_user_id());

		if(!$u->is_admin()) show_error('You do not have permission to access this page');

		$this->load->helper('directory');
	}

	function index()
	{
		$data['files'] = directory_map('./dbbackups');
		$this->load->view('admin/backups/list',$data);
	}

	function create()
	{
		// Load the DB utility class
		$this->load->dbutil();

		$today = date('Y-m-d-H-i-s');
		
		$backup =& $this->dbutil->backup();

		$this->load->helper('file');

		if(!write_file('./dbbackups/'.$today.'.gz', $backup))
		{
		     $this->session->set_flashdata('error', 'Could not create backup');
		}
		else
		{
		     $this->session->set_flashdata('success', 'Backup successfully created');
		}

		redirect('admin/backups');
	}

	function delete($filename = NULL)
	{
		if($filename == NULL) show_error('You cannot access this page directly');

		$filename = './dbbackups/'.$filename;
		if(unlink($filename))
		{
			$this->session->set_flashdata('success', 'Backup successfully deleted');
		}
		else
		{
			$this->session->set_flashdata('error', 'Could not delete backup');
		}

		redirect('admin/backups');

	}

	function download($filename = NULL)
	{
		$this->load->helper('download');
		$fullfilename = './dbbackups/'.$filename;
		$content = file_get_contents($fullfilename);
		force_download($filename, $content);
	}

}