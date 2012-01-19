<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_supplies_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'supplies'...<br/>";
		if (!$this->db->table_exists('supplies'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'description' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'price' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
			));
			$this->dbforge->create_table('supplies', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('supplies');
	}
	
}