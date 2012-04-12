<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Drop_quantity_field_and_add_price_field_to_supply_items extends	Migration {

	function up()
	{
		$this->migrations->set_verbose(true);
		
		print "Adding column 'price' to table 'supplyitems'...<br/>";
		if (!$this->db->field_exists('price','supplyitems'))
		{	
			$this->dbforge->add_column('supplyitems',array(
				'price' => array('type' => 'VARCHAR', 'constraint' => '10', 'null' => FALSE),
			));
		}
		
	}
	
	function down()
	{
		$this->dbforge->drop_column('supplyitems', 'price');
	}
	
}