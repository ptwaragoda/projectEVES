<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Group extends DataMapper {

	var $has_one = array('permission');
	var $has_many = array('user');

	var $validation = array(
		'name' => array(
	    	'label' => 'Group Name',
	    	'rules' => array('required','trim')
		)
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}