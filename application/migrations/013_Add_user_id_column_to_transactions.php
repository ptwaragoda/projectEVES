<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_id_column_to_transactions extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Adding column 'user_id' to table 'transactions'...<br/>";
		if (!$this->db->field_exists('user_id','transactions'))
		{	
			$this->dbforge->add_column('transactions',array(
				'user_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE)
			));
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_column('transactions', 'user_id');
	}
	
}