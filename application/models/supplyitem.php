<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Supplyitem extends DataMapper {

	var $has_one = array('purchasesupplyorder','supply');

	/*var $validation = array(
		

	);*/
    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}