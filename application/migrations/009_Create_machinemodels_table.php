<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_machinemodels_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'machinemodels'...<br/>";
		if (!$this->db->table_exists('machinemodels'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'brand_name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'model_name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE)
			));
			$this->dbforge->create_table('machinemodels', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('machinemodels');
	}
	
}