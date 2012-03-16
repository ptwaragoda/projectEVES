<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_paid_to_transactions_table extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Adding column 'is_paid' to table 'transactions'...<br/>";
		if (!$this->db->field_exists('is_paid','transactions'))
		{	
			$this->dbforge->add_column('transactions',array(
				'is_paid' => array('type' => 'INT', 'constraint'=>'1', 'unsigned' => TRUE, 'null' => FALSE)
			));
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_column('transactions', 'is_paid');
	}
	
}