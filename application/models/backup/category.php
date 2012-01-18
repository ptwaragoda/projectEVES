<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends DataMapper {

	var $has_many = array('deal');
	var $table = 'categories';
	
	//TODO: Validation rules

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}

/* End of file category.php */
/* Location: ./application/models/category.php */