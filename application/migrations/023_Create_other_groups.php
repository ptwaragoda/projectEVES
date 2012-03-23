<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_other_groups extends	Migration {
	
	function up() 
	{
		$this->migrations->set_verbose(true);
		
		print "Creating the 'manager' group...<br/>";
		$this->db->insert('groups',array('id'=>'2', 'name'=>"Manager"));

		print "Creating the 'agent' group...<br/>";
		$this->db->insert('groups',array('id'=>'3', 'name'=>"Agent"));
	}
	
	function down()
	{
		$this->db->delete('groups', array('id' => '2')); 
		$this->db->delete('groups', array('id' => '3')); 
	}
	
}