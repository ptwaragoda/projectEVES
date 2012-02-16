<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tax extends DataMapper {

	var $has_one = array('province');
	var $table = 'taxes';


    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}