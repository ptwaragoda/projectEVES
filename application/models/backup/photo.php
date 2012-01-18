<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends DataMapper {

	var $has_many = array('deal');
	var $table = 'photos';
	
	//TODO: Validation rules

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}

/* End of file photo.php */
/* Location: ./application/models/photo.php */