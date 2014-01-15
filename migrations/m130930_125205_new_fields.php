<?php

class m130930_125205_new_fields extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnuintraoperativenursin_items','entered_or','time not null');
		$this->addColumn('et_ophnuintraoperativenursin_items','time_out','time not null');
		$this->addColumn('et_ophnuintraoperativenursin_items','surgery_start','time not null');
		$this->addColumn('et_ophnuintraoperativenursin_items','surgery_stop','time not null');
		$this->addColumn('et_ophnuintraoperativenursin_items','sign_out','time not null');
		$this->addColumn('et_ophnuintraoperativenursin_items','left_or','time not null');

		$this->addColumn('et_ophnuintraoperativenursin_items','scrub_nurse_id','int(10) unsigned NOT NULL');
		$this->addColumn('et_ophnuintraoperativenursin_items','circulating_nurse_id','int(10) unsigned NOT NULL');
		$this->addColumn('et_ophnuintraoperativenursin_items','anaesthetic_nurse_id','int(10) unsigned NOT NULL');

		$this->update('et_ophnuintraoperativenursin_items',array('scrub_nurse_id'=>1));
		$this->update('et_ophnuintraoperativenursin_items',array('circulating_nurse_id'=>1));
		$this->update('et_ophnuintraoperativenursin_items',array('anaesthetic_nurse_id'=>1));

		$this->createIndex('et_ophnuintraoperativenursin_items_scrub_nurse_id_fk','et_ophnuintraoperativenursin_items','scrub_nurse_id');
		$this->createIndex('et_ophnuintraoperativenursin_items_circulating_nurse_id_fk','et_ophnuintraoperativenursin_items','circulating_nurse_id');
		$this->createIndex('et_ophnuintraoperativenursin_items_anaesthetic_nurse_id_fk','et_ophnuintraoperativenursin_items','anaesthetic_nurse_id');

		$this->addForeignKey('et_ophnuintraoperativenursin_items_scrub_nurse_id_fk','et_ophnuintraoperativenursin_items','scrub_nurse_id','user','id');
		$this->addForeignKey('et_ophnuintraoperativenursin_items_circulating_nurse_id_fk','et_ophnuintraoperativenursin_items','circulating_nurse_id','user','id');
		$this->addForeignKey('et_ophnuintraoperativenursin_items_anaesthetic_nurse_id_fk','et_ophnuintraoperativenursin_items','anaesthetic_nurse_id','user','id');

		$this->addColumn('et_ophnuintraoperativenursin_items','eye_protected','varchar(64) NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('et_ophnuintraoperativenursin_items','eye_protected');

		$this->dropForeignKey('et_ophnuintraoperativenursin_items_scrub_nurse_id_fk','et_ophnuintraoperativenursin_items');
		$this->dropForeignKey('et_ophnuintraoperativenursin_items_circulating_nurse_id_fk','et_ophnuintraoperativenursin_items');
		$this->dropForeignKey('et_ophnuintraoperativenursin_items_anaesthetic_nurse_id_fk','et_ophnuintraoperativenursin_items');

		$this->dropColumn('et_ophnuintraoperativenursin_items','anaesthetic_nurse_id');
		$this->dropColumn('et_ophnuintraoperativenursin_items','circulating_nurse_id');
		$this->dropColumn('et_ophnuintraoperativenursin_items','scrub_nurse_id');

		$this->dropColumn('et_ophnuintraoperativenursin_items','left_or');
		$this->dropColumn('et_ophnuintraoperativenursin_items','sign_out');
		$this->dropColumn('et_ophnuintraoperativenursin_items','surgery_stop');
		$this->dropColumn('et_ophnuintraoperativenursin_items','surgery_start');
		$this->dropColumn('et_ophnuintraoperativenursin_items','time_out');
		$this->dropColumn('et_ophnuintraoperativenursin_items','entered_or');
	}
}
