<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_machinelineitems_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'machinelineitems'...<br/>";
		if (!$this->db->table_exists('machinelineitems'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name'=>array('type'=>'VARCHAR','constraint'=> '60', 'null' => FALSE),
				'quantity'=>array('type'=>'VARCHAR','constraint'=> '11', 'null' => FALSE),
				'price'=>array('type'=>'VARCHAR','constraint'=> '11', 'null' => FALSE),
				'transaction_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'machine_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE)
			));
			$this->dbforge->create_table('machinelineitems', TRUE);
		}
	}
	
	function down()
	{
		$this->dbforge->drop_table('machinelineitems');
	}
	
}