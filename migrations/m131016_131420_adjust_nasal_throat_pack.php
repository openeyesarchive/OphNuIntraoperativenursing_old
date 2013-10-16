<?php

class m131016_131420_adjust_nasal_throat_pack extends CDbMigration
{
	public function up()
	{
		$this->insert('ophnuintraoperativenursin_details_nasal_or_throat_pack',array('id'=>3,'name'=>'None','display_order'=>3));
	}

	public function down()
	{
		$this->delete('ophnuintraoperativenursin_details_nasal_or_throat_pack',"name='None'");
	}
}
