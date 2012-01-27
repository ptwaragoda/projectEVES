<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Status extends DataMapper {

	var $has_many = array('machine');

	var $table = 'statuses';

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}