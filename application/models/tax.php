<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tax extends DataMapper {

	var $has_one = array('province');
	var $table = 'taxes';

	var $validation = array(
		'tax_province' => array(
	    	'label' => 'Tax Province',
	    	'rules' => array('required','trim')
		),
		'tax_value' => array(
	    	'label' => 'Tax Value',
	    	'rules' => array('required','trim')
		),
		'tax_description' => array(
	    	'label' => 'Tax Description',
	    	'rules' => array('required','trim')
		),
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}