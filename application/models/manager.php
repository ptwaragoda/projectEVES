<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends DataMapper {

	var $table = 'users';

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

	//TODO: Look up how to override the get() call 

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}