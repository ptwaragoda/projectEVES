<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Province extends DataMapper {

	var $has_one = array('tax');
	var $table = 'provinces';

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}