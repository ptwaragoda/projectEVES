<?php
class Migration_create_machine_line_item_table extends Migration{
	function up(){
	echo "Creating table 'machine_line_item' ..";
		
		$this->migrations->set_verbose(true);
		if (!$this->db->table_exists('machine_line_item'))
		{
			$this->dbforge->add_key('id',TRUE);
			$this->dbforge->add_field(array(
				'id'=>array('type'=>'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				
				'transaction_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				'machine_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				));
				$this->dbforge->create_table('machine_line_item', TRUE);
			
		echo "Done <br />";

		}



	}
	
	function down()
	{
	echo "Dropping table 'machine_line_item' ...";
	$this->dbforge->drop_table('machine_line_item');
	echo "Done<br />";
	}
	
}

?>
