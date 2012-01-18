<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Purchasesupplyorder extends DataMapper {

	var $has_one = array('user');
	var $has_many = array('supplyitem');

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}