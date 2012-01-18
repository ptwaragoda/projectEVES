<?php

class Migration_create_customer_table extends Migration{
	function up(){
		echo "Creating table 'customer' ..";
		
		$this->migrations->set_verbose(true);
		if (!$this->db->table_exists('customer'))
		{
			$this->dbforge->add_key('id',TRUE);
			$this->dbforge->add_field(array(
			'id'=>array('type'=>'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
			'cName'=>array('type'=>'VARCHAR','constraint'=> '60', 'null' => FALSE),
			'companyName'=>array('type'=>'VARCHAR','constraint'=> '60', 'null' => FALSE),
			'companyAddress'=>array('type'=>'VARCHAR','constraint'=> '200', 'null' => FALSE),
			'cPhone'=>array('type'=>'VARCHAR','constraint'=> '14', 'null' => FALSE),
			'cEmail'=>array('type'=>'VARCHAR','constraint'=> '100', 'null' => FALSE),
			'status'=>array('type'=>'VARCHAR','constraint'=> '10', 'null' => FALSE),
			'created_on' => array('type' => 'DATETIME', 'null' => FALSE),
			'updated_on' => array('type' => 'DATETIME', 'null' => FALSE),
			));
			$this->dbforge->create_table('customer', TRUE);
			
		echo "Done <br />";
		
	}
	}
	

	function down()
	{
	echo "Dropping table 'customer' ...";
	$this->dbforge->drop_table('customer');
	echo "Done<br />";
	}
	
}

?>
