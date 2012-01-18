<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Machine extends DataMapper {

	var $has_one = array('machinemodel');
	var $has_many = array('machinelineitem');

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}