<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_admin_group extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating the 'admin' group...<br/>";

		$this->db->insert('groups',array('id'=>'1', 'name'=>"Admin"));
	}
	
	function down()
	{
		$this->db->delete('groups', array('id' => '1')); 
	}
	
}