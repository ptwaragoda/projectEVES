<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_networks_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'networks'...<br/>";
		if (!$this->db->table_exists('networks'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'province_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
			));
			$this->dbforge->create_table('networks', TRUE);
		}
		
		$this->db->insert('networks',array('name'=>'Toronto'));

	}
	
	function down()
	{
		$this->dbforge->drop_table('networks');
	}
	
}