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
		)
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}