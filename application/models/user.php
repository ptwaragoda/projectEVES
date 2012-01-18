<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class User extends DataMapper {

	var $has_one = array('group');
	var $has_many = array('customer','transaction','purchasesupplyorder');

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}

/* End of file user.php */
/* Location: ./application/models/user.php */