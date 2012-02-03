<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends DataMapper {

	var $has_one = array('customer','user');
	var $has_many = array('machinelineitem');

	

	var $validation = array(
		'start_date' => array(
	    	'label' => 'Start Date',
	    	'rules' => array('required','trim', 'valid_date')
		),
		'end_date' => array(
	    	'label' => 'End Date',
	    	'rules' => array('required','trim','valid_date')
		),
	
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}