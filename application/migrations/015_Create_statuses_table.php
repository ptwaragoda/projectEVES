<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_statuses_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'statuses'...<br/>";
		if (!$this->db->table_exists('statuses'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name'=>array('type'=>'VARCHAR','constraint'=> '60', 'null' => FALSE)
			));
			$this->dbforge->create_table('statuses', TRUE);
		}
	}
	
	function down()
	{
		$this->dbforge->drop_table('statuses');
	}
	
}