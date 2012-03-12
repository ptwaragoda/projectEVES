<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Remove_name_and_quantity_from_machinelineitems_table extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Removing column 'name' from table 'machinelineitems'...<br/>";
		if ($this->db->field_exists('name','machinelineitems'))
		{	
			$this->dbforge->drop_column('machinelineitems', 'name');
			
		}

		print "Removing column 'quantity' from table 'machinelineitems'...<br/>";
		if ($this->db->field_exists('quantity','machinelineitems'))
		{	
			$this->dbforge->drop_column('machinelineitems', 'quantity');
			
		}
		
	}
	
	function down()
	{
		if (!$this->db->field_exists('name','machinelineitems'))
		{
			$this->dbforge->add_column('machinelineitems',array(
				'name'=>array('type'=>'VARCHAR','constraint'=> '255', 'null' => FALSE),
			));
		}
		
		if (!$this->db->field_exists('quantity','machinelineitems'))
		{
			$this->dbforge->add_column('machinelineitems',array(
				'quantity'=>array('type'=>'VARCHAR','constraint'=> '255', 'null' => FALSE),
			));
		}
		
	}
	
}