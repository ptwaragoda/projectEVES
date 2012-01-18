<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Blogpost extends DataMapper {

	var $has_many = array('comment');

	//var $table = '';
	
	var $validation = array(
		'title' => array(
	    	'label' => 'Title',
	    	'rules' => array('required','trim')
		),
	    'description' => array(
	        'label' => 'Description',
	        'rules' => array('required','trim')
	    )
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}