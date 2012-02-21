<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_type_column_to_statuses extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Adding column 'type' to table 'statuses'...<br/>";
		if (!$this->db->field_exists('type','statuses'))
		{	
			$this->dbforge->add_column('statuses',array(
				'type' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE)
			));
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_column('statuses', 'type');
	}
	
}