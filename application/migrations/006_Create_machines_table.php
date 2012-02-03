<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_machines_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'machines'...<br/>";
		if (!$this->db->table_exists('machines'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name'=>array('type'=>'VARCHAR','constraint'=> '60', 'null' => FALSE),
				'cover_square_feet'=>array('type'=>'VARCHAR','constraint'=> '11', 'null' => FALSE),
				'purchase_date'=>array('type'=>'DATETIME','null' => FALSE),
				'serial_num'=>array('type'=>'VARCHAR','constraint'=> '20', 'null' => FALSE),
				'status_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'machinemodel_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE)
			));
			$this->dbforge->create_table('machines', TRUE);
		}
	}
	
	function down()
	{
		$this->dbforge->drop_table('machines');
	}
	
}