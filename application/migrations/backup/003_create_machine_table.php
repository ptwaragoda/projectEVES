<?php
class Migration_create_machine_table extends Migration{
	function up(){
	echo "Creating table 'machine' ..";
		
		$this->migrations->set_verbose(true);
		if (!$this->db->table_exists('machine'))
		{
			$this->dbforge->add_key('id',TRUE);
			$this->dbforge->add_field(array(
				'id'=>array('type'=>'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'mName'=>array('type'=>'VARCHAR','constraint'=> '60', 'null' => FALSE),
				'cover_square_feet'=>array('type'=>'VARCHAR','constraint'=> '11', 'null' => FALSE),
				'purchase_date'=>array('type'=>'DATETIME','null' => FALSE),
				'serial_num'=>array('type'=>'VARCHAR','constraint'=> '20', 'null' => FALSE),
				'status'=>array('type'=>'VARCHAR','constraint'=> '25', 'null' => FALSE),
				'machine_caregory_id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
				));
				$this->dbforge->create_table('machine', TRUE);
			
		echo "Done <br />";

		}



	}
	
	function down()
	{
	echo "Dropping table 'machine' ...";
	$this->dbforge->drop_table('machine');
	echo "Done<br />";
	}
	
}

?>
