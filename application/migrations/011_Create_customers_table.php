<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_customers_table extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating table 'customers'...<br/>";
		if (!$this->db->table_exists('customers'))
		{	
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'first_name'=>array('type'=>'VARCHAR','constraint'=> '255', 'null' => FALSE),
				'last_name'=>array('type'=>'VARCHAR','constraint'=> '255', 'null' => FALSE),
				'company'=>array('type'=>'VARCHAR','constraint'=> '60', 'null' => FALSE),
				'company_address'=>array('type'=>'VARCHAR','constraint'=> '200', 'null' => FALSE),
				'phone'=>array('type'=>'VARCHAR','constraint'=> '14', 'null' => FALSE),
				'email'=>array('type'=>'VARCHAR','constraint'=> '100', 'null' => FALSE),
				'visible' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'default'=> '1'),
				'user_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
				'updated_on' => array('type' => 'DATETIME', 'null' => FALSE)
			));
			$this->dbforge->create_table('customers', TRUE);
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_table('customers');
	}
	
}