<?php

class m140304_100714_transactions extends CDbMigration
{
	public $tables = array('et_ophnuintraoperativenursin_details','et_ophnuintraoperativenursin_items','ophnuintraoperativenursin_additional_assignment','ophnuintraoperativenursin_additional','ophnuintraoperativenursin_details_nasal_or_throat_pack','ophnuintraoperativenursin_details_nonop_eye_protected','ophnuintraoperativenursin_details_viscoelastic_used','ophnuintraoperativenursin_dressing_assignment','ophnuintraoperativenursin_dressing','ophnuintraoperativenursin_grounding_pad_location','ophnuintraoperativenursin_implant_assignment','ophnuintraoperativenursin_implant','ophnuintraoperativenursin_prep_assignment','ophnuintraoperativenursin_prep','ophnuintraoperativenursin_viscoelastic_assignment');

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->addColumn($table,'hash','varchar(40) not null');
			$this->addColumn($table,'transaction_id','int(10) unsigned null');
			$this->createIndex($table.'_tid',$table,'transaction_id');
			$this->addForeignKey($table.'_tid',$table,'transaction_id','transaction','id');
			$this->addColumn($table,'conflicted','tinyint(1) unsigned not null');

			$this->addColumn($table.'_version','hash','varchar(40) not null');
			$this->addColumn($table.'_version','transaction_id','int(10) unsigned null');
			$this->addColumn($table.'_version','deleted_transaction_id','int(10) unsigned null');
			$this->createIndex($table.'_vtid',$table.'_version','transaction_id');
			$this->addForeignKey($table.'_vtid',$table.'_version','transaction_id','transaction','id');
			$this->createIndex($table.'_dtid',$table.'_version','deleted_transaction_id');
			$this->addForeignKey($table.'_dtid',$table.'_version','deleted_transaction_id','transaction','id');
			$this->addColumn($table.'_version','conflicted','tinyint(1) unsigned not null');
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropColumn($table,'hash');
			$this->dropForeignKey($table.'_tid',$table);
			$this->dropIndex($table.'_tid',$table);
			$this->dropColumn($table,'transaction_id');
			$this->dropColumn($table,'conflicted');

			$this->dropColumn($table.'_version','hash');
			$this->dropForeignKey($table.'_vtid',$table.'_version');
			$this->dropIndex($table.'_vtid',$table.'_version');
			$this->dropColumn($table.'_version','transaction_id');
			$this->dropForeignKey($table.'_dtid',$table.'_version');
			$this->dropIndex($table.'_dtid',$table.'_version');
			$this->dropColumn($table.'_version','deleted_transaction_id');
			$this->dropColumn($table.'_version','conflicted');
		}
	}
}
