<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class DealManager extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->tank_auth->is_logged_in()) redirect('auth/login');
	}
	
	function manage()
	{
		$data['scripts'][] = base_url().'public/admin/js/manageDeals.js';
		$data['heading'] = 'Manage Deals';
		$this->load->view('admin/deals/manage',$data);
	}

	function add()
	{
		$categories = new Category();
		$categories->order_by('name','asc')->get();
		$data['categories'] = $categories;

		$d = new Deal();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$d->title = $this->input->post('title');
			$d->short_description = $this->input->post('short_description');
			$d->description = $this->input->post('description');
			$d->fine_print = $this->input->post('fine_print');
			$d->company_name = $this->input->post('company_name');
			$d->address = $this->input->post('address');
			$d->phone = $this->input->post('phone');
			$d->price = $this->input->post('price');
			$d->original_price = $this->input->post('original_price');
			$d->meta_keywords = $this->input->post('meta_keywords');
			$d->end_date = $this->input->post('end_date');
			$d->start_date = $this->input->post('start_date');
			$d->paypal = $this->input->post('paypal');
			$d->video = $this->input->post('video');

			$relatedObjects = array();

			$n = new Network();
			$n->get_by_name('Toronto');
			if($n->exists()) $relatedObjects[] = $n;

			$s = new Dealstatus();
			$s->get_by_name('Unpublished'); // Set it to unpublished for now.
			if($s->exists()) $relatedObjects[] = $s;

			$c = new Category();
			$c->get_by_id($this->input->post('category', TRUE));
			if($c->exists()) $relatedObjects[] = $c;

			$u = new User();
			$u->get_by_id($this->tank_auth->get_user_id());
			if($u->exists()) $relatedObjects[] = $u;

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|gif|png|jpeg';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->display_errors('', '');

			if($this->upload->do_upload('photo'))
			{
				$upload_data = $this->upload->data();
				$p = new Photo();
				$p->url = $upload_data['file_name'];
				if($p->save())
				{
					$relatedObjects[] = $p;
				}
			}
			else
			{
				$data['fileerrors'] = $this->upload->display_errors();
			}

			if($d->save($relatedObjects))
			{
				$this->session->set_flashdata('success', 'The deal was successfully created');
				redirect('admin/dealmanager/edit/'.$d->id);
			}
		}

		$data['errors'] = $d->error;

		$data['deal'] = $d;
		$data['scripts'][] = base_url().'public/admin/js/dealAdd.js';
		$data['heading'] = 'Add Deal';
		$this->load->view('admin/deals/add',$data);
	}
	
	function featureDeal()
	{
		$dealId = $this->input->post('deal');

		$today = date('Y-m-d H:i:s');
		$d = new Deal();
		$d->where('start_date <=', $today)->where('end_date >=', $today)->where('dealstatus_id','2')->where('id',$dealId);
		$d->get();
		if(!$d->exists())
		{
			$this->session->set_flashdata('errors','The deal you are trying to feature does not exist or is not qualified');
			redirect('admin/dealmanager/manage');
		}
		
		$m = new Meta();
		$m->get_by_key('featured_deal');
		$m->value = $dealId;
		if($m->save())
		{
			$this->session->set_flashdata('success','The featured deal was successfully updated');
		}
		else
		{
			$this->session->set_flashdata('errors','The deal could not be featured');
		}
		redirect('admin/dealmanager/manage');
	}

	function edit($dealId = NULL)
	{
		if($dealId == NULL) show_error('You cannot access this page directly');

		$d = new Deal();
		$d->get_by_id($dealId);
		if(!$d->exists()) show_error('The deal you are trying to edit does not exist');

		$categories = new Category();
		$categories->order_by('name','asc')->get();
		$data['categories'] = $categories;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$d->title = $this->input->post('title');
			$d->short_description = $this->input->post('short_description');
			$d->description = $this->input->post('description');
			$d->fine_print = $this->input->post('fine_print');
			$d->company_name = $this->input->post('company_name');
			$d->address = $this->input->post('address');
			$d->phone = $this->input->post('phone');
			$d->price = $this->input->post('price');
			$d->original_price = $this->input->post('original_price');
			$d->meta_keywords = $this->input->post('meta_keywords');
			$d->end_date = $this->input->post('end_date');
			$d->start_date = $this->input->post('start_date');
			$d->paypal = $this->input->post('paypal');
			$d->video = $this->input->post('video');

			$relatedObjects = array();

			$c = new Category();
			$c->get_by_id($this->input->post('category'));
			if($c->exists()) $relatedObjects[] = $c;
			
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|gif|png|jpeg';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->display_errors('', '');

			if($this->upload->do_upload('photo'))
			{
				$upload_data = $this->upload->data();
				$p = new Photo();
				$p->url = $upload_data['file_name'];
				if($p->save())
				{
					$relatedObjects[] = $p;
				}
			}
			else
			{
				if($this->upload->display_errors())
				{
					$data['fileerrors'] = $this->upload->display_errors();
				}
			}

			if($d->save($relatedObjects))
			{
				$this->session->set_flashdata('success', 'The deal was successfully updated');
				redirect('admin/dealmanager/edit/'.$d->id);
			}
		}

		$data['errors'] = $d->error;

		$data['deal'] = $d;
		$data['heading'] = 'Edit Deal';
		$this->load->view('admin/deals/edit',$data);
	}

	/*Note: On second thought, let's not have a function to delete deals. Unpublish should do for now.
	
	function delete($dealId = NULL)
	{
		if($dealId == NULL) show_error('You cannot access this page directly');
		
		$d = new Deal();
		$d->get_by_id($dealId);
		if(!$d->exists()) show_error('The deal you are trying to delete does not exist');
		
	}*/

	function toggleStatus($dealId = NULL)
	{
		if(!$this->input->is_ajax_request()) show_error('You cannot access this page directly');

		$status_id = trim($this->input->post('status', TRUE));
		if($dealId == NULL || !$status_id)
		{
			echo json_encode(array('status'=>'0', 'message'=>'An error occurred. Refresh the page and try again.'));
			return false;
		}
		
		$status = new Dealstatus();
		$status->get_by_id($status_id);
		if(!$status->exists())
		{
			echo json_encode(array('status'=>'0', 'message'=>'The status you are trying to assign is invalid'));
			return false;
		}

		$d = new Deal();
		$d->get_by_id($dealId);
		if(!$d->exists())
		{
			echo json_encode(array('status'=>'0', 'message'=>'The deal you are trying to modify does not exist.'));
			return false;
		}

		if($d->save($status))
		{
			echo json_encode(array('status'=>'1', 'message'=>''));
			return true;
		}
		echo json_encode(array('status'=>'0', 'message'=>'An error occurred. Refresh the page and try again.'));
		return false;
	}
	
	function getDealData()
	{
		$a = new Deal();
		$aColumns = array( 'id', 'title', 'start_date', 'end_date', 'dealstatus_id', 'user_id' );
		
		/* 
		 * Paging
		 */
		if(isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1')
		{
			$a->limit($_GET['iDisplayLength'], $_GET['iDisplayStart']);
		}
		
		/*
		 * Ordering
		 */
		if(isset($_GET['iSortCol_0']))
		{
			for($i=0;$i<intval($_GET['iSortingCols']);$i++)
			{
				if($_GET['bSortable_'.intval($_GET['iSortCol_'.$i])]=="true")
				{
					$a->order_by($aColumns[intval($_GET['iSortCol_'.$i])], $_GET['sSortDir_'.$i]);
				}
			}
		}


		/* 
		 * Filtering
		 * NOTE this does not match the built-in DataTables filtering which does it
		 * word by word on any field. It's possible to do here, but concerned about efficiency
		 * on very large tables, and MySQL's regex functionality is very limited
		 */
		if($_GET['sSearch'] != "")
		{
			$a->or_group_start();
			$a->like('title',$_GET['sSearch']);
			$a->group_end();
		}

		/* Individual column filtering */
		for ($i=0;$i<count($aColumns);$i++)
		{
			if($_GET['bSearchable_'.$i]=="true" && $_GET['sSearch_'.$i]!='')
			{
				$a->like($aColumns[$i],$_GET['sSearch_'.$i]);
			}
		}
		
		$a2 = $a->get_clone();
		$iFilteredTotal = $a2->count();
		$rResult = $a->get();
		
		$a3 = new Deal();
		$iTotal = $a3->count();


		/*
		 * Output
		 */
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
			"iTotalRecords" => $iTotal,
			"iTotalDisplayRecords" => $iFilteredTotal,
			"aaData" => array()
		);

		foreach($rResult->all as $aRow)
		{
			$row = array();
			$id = '';
			for($i=0;$i<count($aColumns);$i++)
			{	
				if($aColumns[$i] == 'dealstatus_id')
				{
					$s = new Dealstatus();
					$s->get_by_id($aRow->{$aColumns[$i]});
					$row[] = $s->name;
				}
				elseif($aColumns[$i] == "user_id")
				{
					$u = new User();
					$u->get_by_id($aRow->{$aColumns[$i]});
					$row[] = $u->username;
					//$row[] = '<a target="_blank" href="'.base_url().'uploads/resumes/'.$aRow[$aColumns[$i]].'">'.$aRow[$aColumns[$i]].'</a>';
				}
				elseif($aColumns[$i] == 'start_date' || $aColumns[$i] == 'end_date')
				{
					$row[] = date('Y-m-d',strtotime($aRow->{$aColumns[$i]}));
				}
				elseif($aColumns[$i] == 'id')
				{
					$id = $aRow->{$aColumns[$i]};
					$row[] = $aRow->{$aColumns[$i]};
				}
				elseif($aColumns[$i] != ' ' )
				{
					/* General output */
					$row[] = $aRow->{$aColumns[$i]};
				}
			}

			$actions = '<a href="'.site_url('admin/dealmanager/edit/'.$id).'">View</a> | ';

			if($s->name == 'Published')
			{
				$actions .= '<a class="unpublish" href="#">Unpublish</a>';
			}
			else
			{
				$actions .= '<a class="publish" href="#">Publish</a>';
			}
			
			$row[] = $actions;
			$output['aaData'][] = $row;
		}

		echo json_encode($output);
	}
}