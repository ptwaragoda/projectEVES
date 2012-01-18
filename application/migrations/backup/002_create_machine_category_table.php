<?php
class Migration_create_machine_category_table extends Migration{
	function up(){
	echo "Creating table 'machine_category' ..";
		
		$this->migrations->set_verbose(true);
		if (!$this->db->table_exists('machine_category'))
		{
			$this->dbforge->add_key('id',TRUE);
			$this->dbforge->add_field(array(
				'id'=>array('type'=>'INT', 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'brandName'=>array('type'=>'VARCHAR','constraint'=> '60', 'null' => FALSE),
				'modelNumber'=>array('type'=>'VARCHAR','constraint'=> '11', 'null' => FALSE),

				));
				$this->dbforge->create_table('machine_category', TRUE);
			
		echo "Done <br />";

		}



	}
	
	function down()
	{
	echo "Dropping table 'machine_category' ...";
	$this->dbforge->drop_table('machine_category');
	echo "Done<br />";
	}
	
}

?>
