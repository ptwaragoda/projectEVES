<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_purchasesupplyorders_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'purchasesupplyorders'...<br/>";
		if (!$this->db->table_exists('purchasesupplyorders'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'total' => array('type' => 'VARCHAR', 'constraint' => '25', 'null' => FALSE),
				'final_total' => array('type' => 'VARCHAR', 'constraint' => '30', 'null' => TRUE),
				'payment_status' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE),
				'end_date' => array('type' => 'DATETIME', 'null' => FALSE),
				'start_date' => array('type' => 'DATETIME', 'null' => FALSE),
			));
			$this->dbforge->create_table('purchasesupplyorders', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('purchasesupplyorders');
	}
	
}