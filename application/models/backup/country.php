<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Country extends DataMapper {

	var $has_many = array('network');
	
	

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}

/* End of file country.php */
/* Location: ./application/models/country.php */