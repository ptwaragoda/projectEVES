<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_groups_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'groups'...<br/>";
		if (!$this->db->table_exists('groups'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name'=>array('type'=>'VARCHAR','constraint'=> '255', 'null' => FALSE),
				'permission_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE)
			));
			$this->dbforge->create_table('groups', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('groups');
	}
	
}