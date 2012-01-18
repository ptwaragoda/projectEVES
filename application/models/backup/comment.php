<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends DataMapper {

	var $has_one = array('blogpost');
	
	var $validation = array(
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