<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends DataMapper {

	var $has_one = array('customer','user');
	var $has_many = array('machinelineitem');

	var $validation = array(
		'start_date' => array(
	    	'label' => 'Start date',
	    	'rules' => array('required','trim', 'valid_date')
		),
		'end_date' => array(
	    	'label' => 'End date',
	    	'rules' => array('required','trim','valid_date')
		),
		'trans_date' => array(
	    	'label' => 'Transaction date',
	    	'rules' => array('required','trim','valid_date')
		),
		'total_rent' => array(
	    	'label' => 'Sub total',
	    	'rules' => array('trim','numeric')
		),
		'final_total' => array(
	    	'label' => 'Total',
	    	'rules' => array('trim','numeric')
		),
		'tax' => array(
	    	'label' => 'Tax',
	    	'rules' => array('required','trim','numeric')
		),
		'customer' => array(
			'label' => 'Customer',
			'rules' => array('required')
		),
		'user' => array(
			'label' => 'User',
			'rules' => array('required')
		)
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}