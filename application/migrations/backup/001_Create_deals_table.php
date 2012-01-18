<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_deals_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'deals'...<br/>";
		if (!$this->db->table_exists('deals'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'title' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'short_description' => array('type' => 'TEXT', 'null' => TRUE),
				'description' => array('type' => 'TEXT', 'null' => TRUE),
				'fine_print' => array('type' => 'TEXT', 'null' => TRUE),
				'company_name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'address' => array('type' => 'TEXT', 'null' => TRUE),
				'phone' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'price' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'original_price' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'meta_keywords' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'network_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'category_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'user_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'photo_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'dealstatus_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'end_date' => array('type' => 'DATETIME', 'null' => FALSE),
				'start_date' => array('type' => 'DATETIME', 'null' => FALSE),
				'paypal' => array('type' => 'TEXT', 'null' => TRUE),
			));
			$this->dbforge->create_table('deals', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('deals');
	}
	
}