<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_blogposts_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'blogposts'...<br/>";
		if (!$this->db->table_exists('blogposts'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'title' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'description' => array('type' => 'TEXT', 'null' => TRUE),
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE),
			));
			$this->dbforge->create_table('blogposts', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('blogposts');
	}
	
}