<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_statuses_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'status'...<br/>";
		if (!$this->db->table_exists('status'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
			));
			$this->dbforge->create_table('status', TRUE);
		}
		
		$this->db->insert('status',array('id'=>'1', 'name'=>'Unpublished'));
		$this->db->insert('status',array('id'=>'2', 'name'=>'Published'));

	}
	
	function down()
	{
		$this->dbforge->drop_table('status');
	}
	
}