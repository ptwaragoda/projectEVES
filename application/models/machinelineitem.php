/<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Machinelineitem extends DataMapper {

	var $has_one = array('transaction','machine');

	var $table = 'Machinelineitems';

	var $validation = array(
		'name' => array(
	    	'label' => 'Machine Name',
	    	'rules' => array('required','trim','max_size' => 255)
		),
		'quantity' => array(
	    	'label' => 'Quantity',
	    	'rules' => array('required','trim','integer')
		),
		'price' => array( // This is a field validation
	    	'label' => 'Machine Price',
	    	'rules' => array('required','trim','decimal')
		),
		'transaction' => array( // This is a relationship validation
	    	'label' => 'Transaction',
	    	'rules' => array('required')
		),
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}