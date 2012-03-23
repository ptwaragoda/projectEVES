<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_group_relationship_to_the_users_table extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Adding column 'group_id' to table 'users'...<br/>";
		if (!$this->db->field_exists('group_id','users'))
		{	
			$this->dbforge->add_column('users',array(
				'group_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE)
			));
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_column('users', 'group_id');
	}
	
}