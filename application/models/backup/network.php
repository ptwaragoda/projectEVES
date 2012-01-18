<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Network extends DataMapper {

	var $has_many = array('deal');
	var $has_one = array('province');
	
	//TODO: Validation rules

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}

/* End of file network.php */
/* Location: ./application/models/network.php */