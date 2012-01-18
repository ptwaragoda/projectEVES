<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_pages_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'pages'...<br/>";
		if (!$this->db->table_exists('pages'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'title' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'description' => array('type' => 'TEXT', 'null' => FALSE),
				'meta_keywords' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'meta_description' => array('type' => 'TEXT', 'null' => FALSE),
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE)
			));
			$this->dbforge->create_table('pages', TRUE);
			
			$this->db->insert('pages', array('id'=>'1','title'=>'About'));
			$this->db->insert('pages', array('id'=>'2','title'=>'Jobs'));
			$this->db->insert('pages', array('id'=>'3','title'=>'Press'));
			$this->db->insert('pages', array('id'=>'4','title'=>'Help'));
			$this->db->insert('pages', array('id'=>'5','title'=>'Terms'));
			$this->db->insert('pages', array('id'=>'6','title'=>'Privacy Policy'));
			$this->db->insert('pages', array('id'=>'7','title'=>'Thank You'));
		}
	}
	
	function down()
	{
		$this->dbforge->drop_table('pages');
	}
	
}
