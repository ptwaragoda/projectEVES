<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_permissions_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'permissions'...<br/>";
		if (!$this->db->table_exists('permissions'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'can_see_agents' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'can_edit_agents' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'can_create_agents' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'group_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
			));
			$this->dbforge->create_table('permissions', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('permissions');
	}
	
}