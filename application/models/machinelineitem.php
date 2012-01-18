<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Machinelineitem extends DataMapper {

	var $has_one = array('transaction','machine');

	var $table = 'Machinelineitems';

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}