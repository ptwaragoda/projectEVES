<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_date_related_fields_to_transactions extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Adding column date related fields to table 'transactions'...<br/>";
		if (!$this->db->field_exists('created_on','transactions'))
		{	
			$this->dbforge->add_column('transactions',array(
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE)
			));
		}

		if (!$this->db->field_exists('updated_on','transactions'))
		{	
			$this->dbforge->add_column('transactions',array(
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE)
			));
		}		
	}
	
	function down()
	{
		$this->dbforge->drop_column('transactions', 'created_on');
		$this->dbforge->drop_column('transactions', 'updated_on');
	}
	
}