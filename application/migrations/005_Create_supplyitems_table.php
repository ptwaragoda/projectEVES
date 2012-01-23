<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_supplyitems_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'supplyitems'...<br/>";
		if (!$this->db->table_exists('supplyitems'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'quantity' => array('type' => 'VARCHAR', 'constraint' => '10', 'null' => FALSE)
			));
			$this->dbforge->create_table('supplyitems', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('supplyitems');
	}
	
}