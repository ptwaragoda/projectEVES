<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends DataMapper {

	var $has_one = array('group');

	var $validation = array(
		'can_see_agents' => array(
	    	'label' => 'Can See Agents permission',
	    	'rules' => array('required','trim','integer')
		),
		'can_edit_agents' => array(
	    	'label' => 'Can Edit Agents permission',
	    	'rules' => array('required','trim','integer')
		),
		'can_create_agents' => array(
	    	'label' => 'Can Create Agents permission',
	    	'rules' => array('required','trim','integer')
		),
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}