<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_provinces_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'provinces'...<br/>";
		if (!$this->db->table_exists('provinces'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'short_name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
				'name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE)
			));
			$this->dbforge->create_table('provinces', TRUE);
		}

		$this->db->insert('provinces',array('short_name'=>"AB",'name'=>'Alberta'));
        $this->db->insert('provinces',array('short_name'=>"BC",'name'=>'British Columbia'));
        $this->db->insert('provinces',array('short_name'=>"MB",'name'=>'Manitoba'));
        $this->db->insert('provinces',array('short_name'=>"NB",'name'=>'New Brunswick'));
        $this->db->insert('provinces',array('short_name'=>"NL",'name'=>'Newfoundland and Labrador'));
        $this->db->insert('provinces',array('short_name'=>"NT",'name'=>'Northwest Territories'));
        $this->db->insert('provinces',array('short_name'=>"NS",'name'=>'Nova Scotia'));
        $this->db->insert('provinces',array('short_name'=>"NU",'name'=>'Nunavut'));
        $this->db->insert('provinces',array('short_name'=>"PE",'name'=>'Prince Edward Island'));
        $this->db->insert('provinces',array('short_name'=>"SK",'name'=>'Saskatchewan'));
        $this->db->insert('provinces',array('short_name'=>"ON",'name'=>'Ontario'));
        $this->db->insert('provinces',array('short_name'=>"QC",'name'=>'Quebec'));
        $this->db->insert('provinces',array('short_name'=>"YT",'name'=>'Yukon'));


	}
	
	function down()
	{
		$this->dbforge->drop_table('provinces');
	}
	
}