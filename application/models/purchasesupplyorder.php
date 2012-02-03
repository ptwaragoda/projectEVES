<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Purchasesupplyorder extends DataMapper {

	var $has_one = array('user');
	var $has_many = array('supplyitem');


	var $validation = array(
		'total' => array(
	    	'label' => 'Total',
	    	'rules' => array('required','trim')
		),
		'final_total' => array(
	    	'label' => 'Final Total',
	    	'rules' => array('required','trim')
		),
		'payment_status' => array(
	    	'label' => 'Payment Status',
	    	'rules' => array('required','trim', 'valid_email')
		),
		'end_date' => array(
	    	'label' => 'End Date',
	    	'rules' => array('required','trim')
		),
		'start_date' => array(
	    	'label' => 'Start Date',
	    	'rules' => array('required','trim')
		),
	);
    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}