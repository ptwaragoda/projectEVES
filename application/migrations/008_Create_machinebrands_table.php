<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_machinebrands_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'machinebrands'...<br/>";
		if (!$this->db->table_exists('machinebrands'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'machine_brand_name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'machine_brand_serialnum' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
			));
			$this->dbforge->create_table('machinebrands', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('machinebrands');
	}
	
}