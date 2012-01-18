<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Machinebrand extends DataMapper {

	var $has_many = array('machinemodel');

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