<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Machine extends DataMapper {

	var $has_one = array('machinemodel','status');
	var $has_many = array('machinelineitem');

	var $validation = array(
		'name' => array(
	    	'label' => 'Machine Name',
	    	'rules' => array('required','trim','max_size' => 255)
		),
		'cover_square_feet' => array(
	    	'label' => 'Cover square feet',
	    	'rules' => array('required','trim','numeric')
		),
		'purchase_date' => array(
	    	'label' => 'Purchase Date',
	    	'rules' => array('required','trim','valid_date')//check date, required?
		),
		'serial_num' => array(
	    	'label' => 'Machine Serial Number',
	    	'rules' => array('required','trim','integer')
		),
		'status_id' => array(
	    	'label' => 'Machine Status',
	    	'rules' => array('required','trim')
		),
	);


    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}