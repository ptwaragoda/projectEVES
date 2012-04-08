<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Remove_start_date_and_end_date_from_purchasesupplyorders_table extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Removing column 'start_date' from table 'purchasesupplyorders'...<br/>";
		if ($this->db->field_exists('start_date','purchasesupplyorders'))
		{	
			$this->dbforge->drop_column('purchasesupplyorders', 'start_date');
			
		}

		print "Removing column 'end_date' from table 'purchasesupplyorders'...<br/>";
		if ($this->db->field_exists('end_date','purchasesupplyorders'))
		{	
			$this->dbforge->drop_column('purchasesupplyorders', 'end_date');
			
		}
		
	}
	
	function down()
	{
		if (!$this->db->field_exists('start_date','purchasesupplyorders'))
		{
			$this->dbforge->add_column('purchasesupplyorders',array(
				'start_date' => array('type' => 'DATETIME', 'null' => FALSE),
			));
		}
		
		if (!$this->db->field_exists('end_date','purchasesupplyorders'))
		{
			$this->dbforge->add_column('purchasesupplyorders',array(
				'end_date' => array('type' => 'DATETIME', 'null' => FALSE),
			));
		}
		
	}
	
}