<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Supply extends DataMapper {

	var $has_many = array('supplyitem');
	var $table = 'supplies';

	var $validation = array(
		'name' => array(
	    	'label' => 'Supply Name',
	    	'rules' => array('required','trim')
		),
		'price' => array(
	    	'label' => 'Supply Price',
	    	'rules' => array('required','trim')
		),
	);
    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}