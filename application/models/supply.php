<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Supply extends DataMapper {

	var $has_many = array('supplyitem');
	var $table = 'supplies';


    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}