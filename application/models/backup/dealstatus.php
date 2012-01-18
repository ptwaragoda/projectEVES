<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Dealstatus extends DataMapper {

	var $has_many = array('deal');
	var $table = 'status';
	
	var $validation = array(
		'name' => array(
	    	'label' => 'Name',
	    	'rules' => array('required','trim')
		)
	);

    function __construct($id = NULL)
    {
        parent::__construct();
    }
	
}

/* End of file status.php */
/* Location: ./application/models/status.php */