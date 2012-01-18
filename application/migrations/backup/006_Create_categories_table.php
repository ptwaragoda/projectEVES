<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'categories'...<br/>";
		if (!$this->db->table_exists('categories'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'stub' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
			));
			$this->dbforge->create_table('categories', TRUE);
		}
		
		$this->db->insert('categories',array('stub'=>'marketing','name'=>'Marketing'));
		$this->db->insert('categories',array('stub'=>'technology','name'=>'Technology'));
		$this->db->insert('categories',array('stub'=>'travel','name'=>'Travel'));
		$this->db->insert('categories',array('stub'=>'furniture','name'=>'Furniture'));
		$this->db->insert('categories',array('stub'=>'stationary','name'=>'Stationary'));
		$this->db->insert('categories',array('stub'=>'professional-services','name'=>'Professional Services'));
	}
	
	function down()
	{
		$this->dbforge->drop_table('categories');
	}
	
}