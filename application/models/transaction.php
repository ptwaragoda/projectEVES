<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends DataMapper {

	var $has_one = array('customer','user');
	var $has_many = array('machinelineitem');

	//TODO: Add validations

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}