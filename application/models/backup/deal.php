<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Deal extends DataMapper {

	var $has_one = array('user','photo','dealstatus','category','network');
	
	var $validation = array(
		'title' => array(
	    	'label' => 'Title',
	    	'rules' => array('required','trim')
		),
	    'description' => array(
	        'label' => 'Description',
	        'rules' => array('required','trim')
	    ),
		'address' => array(
	        'label' => 'Address',
	        'rules' => array('trim')
	    ),
	    'fine_print' => array(
	        'label' => 'Fine Print',
	        'rules' => array('trim')
	    ),
		'company_name' => array(
	        'label' => 'Company Name',
	        'rules' => array('required','trim')
	    ),
		'phone' => array(
	        'label' => 'Phone Number',
	        'rules' => array('trim')
	    ),
		'video' => array(
	        'label' => 'Video URL',
	        'rules' => array('trim')
	    ),
		'price' => array(
	        'label' => 'Price',
	        'rules' => array('trim')
	    ),
		'original_price' => array(
	        'label' => 'Original Price',
	        'rules' => array('trim')
	    ),
		'meta_keywords' => array(
	        'label' => 'Meta Keywords',
	        'rules' => array('trim')
	    ),
		'end_date' => array(
	        'label' => 'End Date',
	        'rules' => array('required','trim')
	    ),
		'start_date' => array(
	        'label' => 'Start Date',
	        'rules' => array('required','trim')
	    ),
		'dealstatus' => array(
	        'label' => 'Status',
	        'rules' => array('required')
	    ),
		'paypal' => array(
	        'label' => 'Paypal Code',
	        'rules' => array('trim')
	    ),
	    'network' => array(
	        'label' => 'Network',
	        'rules' => array('required')
	    ),
	    'category' => array(
	        'label' => 'Category',
	        'rules' => array('required')
	    ),
	    'user' => array(
	        'label' => 'User',
	        'rules' => array('required')
	    ),
	    'photo' => array(
	        'label' => 'Photo',
	        'rules' => array()
	    )
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}

/* End of file deal.php */
/* Location: ./application/models/deal.php */