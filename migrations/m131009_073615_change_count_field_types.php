<?php

class m131009_073615_change_count_field_types extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('et_ophnuintraoperativenursin_items','needles1','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','needles2','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','needles3','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','blades1','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','blades2','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','blades3','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','plugs1','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','plugs2','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','plugs3','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','trocars1','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','trocars2','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','trocars3','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','sponges_gauze1','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','sponges_gauze2','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','sponges_gauze3','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','pledgetts1','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','pledgetts2','varchar(16) NOT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','pledgetts3','varchar(16) NOT NULL');
	}

	public function down()
	{
		$this->alterColumn('et_ophnuintraoperativenursin_items','needles1','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','needles2','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','needles3','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','blades1','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','blades2','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','blades3','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','plugs1','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','plugs2','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','plugs3','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','trocars1','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','trocars2','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','trocars3','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','sponges_gauze1','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','sponges_gauze2','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','sponges_gauze3','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','pledgetts1','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','pledgetts2','int(10) unsigned DEFAULT NULL');
		$this->alterColumn('et_ophnuintraoperativenursin_items','pledgetts3','int(10) unsigned DEFAULT NULL');
	}
}
