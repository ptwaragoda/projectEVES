<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_is_paid_and_is_draft_fields_to_purchasesupplyorders_table extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Adding column 'is_paid' to table 'purchasesupplyorders'...<br/>";
		if (!$this->db->field_exists('is_paid','purchasesupplyorders'))
		{	
			$this->dbforge->add_column('purchasesupplyorders',array(
				'is_paid' => array('type' => 'INT', 'constraint'=>'1', 'unsigned' => TRUE, 'null' => FALSE)
			));
		}

		print "Adding column 'is_draft' to table 'purchasesupplyorders'...<br/>";
		if (!$this->db->field_exists('is_draft','purchasesupplyorders'))
		{	
			$this->dbforge->add_column('purchasesupplyorders',array(
				'is_draft' => array('type' => 'INT', 'constraint'=>'1', 'unsigned' => TRUE, 'null' => FALSE)
			));
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_column('purchasesupplyorders', 'is_paid');
		$this->dbforge->drop_column('purchasesupplyorders', 'is_draft');
	}
	
}