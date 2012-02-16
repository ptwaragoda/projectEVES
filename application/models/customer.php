<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends DataMapper {

	var $has_one = array('user');
	var $has_many = array('transaction');

	var $validation = array(
		'first_name' => array(
	    	'label' => 'First Name',
	    	'rules' => array('required','trim')
		),
		'last_name' => array(
	    	'label' => 'Last Name',
	    	'rules' => array('required','trim')
		),
		'email' => array(
	    	'label' => 'Email Address',
	    	'rules' => array('required','trim', 'valid_email')
		),
		'company' => array(
	    	'label' => 'Company Name',
	    	'rules' => array('trim')
		),
		'company_address' => array(
	    	'label' => 'Company Address',
	    	'rules' => array('trim')
		),
		'phone' => array(
	    	'label' => 'Phone',
	    	'rules' => array('trim','required')
		),
		'visible' => array(
	    	'label' => 'Company Name',
	    	'rules' => array('trim','integer')
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

    function getFullName()
    {
    	return $this->first_name.' '.$this->last_name;
    }
	
}