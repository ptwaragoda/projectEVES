<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_metas_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'metas'...<br/>";
		if (!$this->db->table_exists('metas'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'key' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'value' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
			));
			$this->dbforge->create_table('metas', TRUE);
			
			$this->db->insert('metas', array('key'=>'featured_deal','value'=>'1'));
		}
	}
	
	function down()
	{
		$this->dbforge->drop_table('metas');
	}
	
}
