<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_taxes_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'taxes'...<br/>";
		if (!$this->db->table_exists('taxes'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'value' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE)
			));
			$this->dbforge->create_table('taxes', TRUE);
		}	
	}
	
	function down()
	{
		$this->dbforge->drop_table('taxes');
	}
	
}