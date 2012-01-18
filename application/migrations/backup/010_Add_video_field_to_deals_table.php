<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_video_field_to_deals_table extends	Migration {

	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Adding column 'video' to table 'deals'...<br/>";
		if (!$this->db->field_exists('video','deals'))
		{	
			$this->dbforge->add_column('deals',array(
				'video' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE)
			));
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_column('deals', 'video');
	}
	
}