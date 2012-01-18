<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Province extends DataMapper {

	var $has_many = array('network');
	var $has_one = array('country');
	
	//TODO: Validation rules

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}

/* End of file province.php */
/* Location: ./application/models/province.php */