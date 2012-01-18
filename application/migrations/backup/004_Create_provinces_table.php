<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_provinces_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'provinces'...<br/>";
		if (!$this->db->table_exists('provinces'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'country_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
			));
			$this->dbforge->create_table('provinces', TRUE);
		}

	}
	
	function down()
	{
		$this->dbforge->drop_table('provinces');
	}
	
}