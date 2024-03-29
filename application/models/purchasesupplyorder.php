<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Purchasesupplyorder extends DataMapper {

	var $has_one = array('user');
	var $has_many = array('supplyitem');


	var $validation = array(
		'total' => array(
	    	'label' => 'Sub total',
	    	'rules' => array('trim','numeric')
		),
		'final_total' => array(
	    	'label' => 'Total',
	    	'rules' => array('trim','numeric')
		)
	);
    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}