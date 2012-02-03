<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_transactions_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'transactions'...<br/>";
		if (!$this->db->table_exists('transactions'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'trans_date' => array('type' => 'DATETIME', 'null' => FALSE),
				'start_date' => array('type' => 'DATETIME','null' => FALSE),
				'end_date' => array('type' => 'DATETIME','null' => FALSE),
				'total_rent' => array('type' => 'VARCHAR', 'constraint' => '255','null' => FALSE),
	 			'final_total' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
	 			'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE)
			));
			$this->dbforge->create_table('transactions', TRUE);
		}
	}
	
	function down()
	{
		$this->dbforge->drop_table('transactions');
	}
	
}