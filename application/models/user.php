<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User extends DataMapper {

	var $has_one = array('group');
	var $has_many = array('customer','transaction','purchasesupplyorder');

    function __construct($id = NULL)
    {
        parent::__construct();
    }

    function is_admin()
    {
    	$group = $this->group->get();
    	return ($group->exists() && $group->id == '1');
    }

    function is_manager()
    {
    	$group = $this->group->get();
    	return ($group->exists() && $group->id == '2');
    }

    function is_agent()
    {
    	$group = $this->group->get();
    	return ($group->exists() && $group->id == '3');
    }
	
}

/* End of file user.php */
/* Location: ./application/models/user.php */