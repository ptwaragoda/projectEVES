<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_comments_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'comments'...<br/>";
		if (!$this->db->table_exists('comments'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'description' => array('type' => 'TEXT', 'null' => TRUE),
				'blogpost_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE),
			));
			$this->dbforge->create_table('comments', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('comments');
	}
	
}