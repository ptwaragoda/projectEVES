<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Machinemodel extends DataMapper {

	var $has_one = array('machinebrand');
	var $has_many = array('machine');

	var $validation = array(
		'name' => array(
	    	'label' => 'Brand Name',
	    	'rules' => array('required','trim'),
	    )
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}