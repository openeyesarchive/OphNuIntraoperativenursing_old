<?php

class m131206_150659_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnuintraoperativenursin_details','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_details_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_items','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_items_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnuintraoperativenursin_details','deleted');
		$this->dropColumn('et_ophnuintraoperativenursin_details_version','deleted');
		$this->dropColumn('et_ophnuintraoperativenursin_items','deleted');
		$this->dropColumn('et_ophnuintraoperativenursin_items_version','deleted');
	}
}
