<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Machinebrand extends DataMapper {

	var $has_many = array('machinemodel');

	var $validation = array(
		'machine_brand_name' => array(
	    	'label' => 'Machine Brand Name',
	    	'rules' => array('required','trim')
		),
		'machine_brand_serialnum' => array(
	    	'label' => 'Machine Brand Serial Number',
	    	'rules' => array('required','trim')
		)
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}