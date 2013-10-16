<?php

class m131016_093157_additional_fields extends CDbMigration
{
	public function up()
	{
		$this->insert('ophnuintraoperativenursin_details_viscoelastic_used',array('id'=>4,'name'=>'Viscoat','display_order'=>4));
		$this->insert('ophnuintraoperativenursin_details_viscoelastic_used',array('id'=>5,'name'=>'Provisc','display_order'=>5));

		$this->alterColumn('et_ophnuintraoperativenursin_details','grounding_pad','tinyint(1) unsigned not null');

		$this->update('et_ophnuintraoperativenursin_details',array('grounding_pad'=>'0'));

		$this->createTable('ophnuintraoperativenursin_grounding_pad_location', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) collate utf8_bin not null',
				'display_order' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_grounding_pad_location_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_grounding_pad_location_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_grounding_pad_location_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_grounding_pad_location_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperativenursin_grounding_pad_location',array('id'=>1,'name'=>'Buttocks','display_order'=>1));
		$this->insert('ophnuintraoperativenursin_grounding_pad_location',array('id'=>2,'name'=>'Thigh','display_order'=>2));

		$this->addColumn('et_ophnuintraoperativenursin_details','location_id','int(10) unsigned null');
		$this->createIndex('et_ophnuintraoperativenursin_details_location_id_fk','et_ophnuintraoperativenursin_details','location_id');
		$this->addForeignKey('et_ophnuintraoperativenursin_details_location_id_fk','et_ophnuintraoperativenursin_details','location_id','ophnuintraoperativenursin_grounding_pad_location','id');

		$this->addColumn('et_ophnuintraoperativenursin_details','count_discrepancy','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_details','xray_required','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_details','specimins_collected','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_details','path_form_completed','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnuintraoperativenursin_details','path_form_completed');
		$this->dropColumn('et_ophnuintraoperativenursin_details','specimins_collected');
		$this->dropColumn('et_ophnuintraoperativenursin_details','xray_required');
		$this->dropColumn('et_ophnuintraoperativenursin_details','count_discrepancy');

		$this->dropForeignKey('et_ophnuintraoperativenursin_details_location_id_fk','et_ophnuintraoperativenursin_details');
		$this->dropIndex('et_ophnuintraoperativenursin_details_location_id_fk','et_ophnuintraoperativenursin_details');
		$this->dropColumn('et_ophnuintraoperativenursin_details','location_id');

		$this->dropTable('ophnuintraoperativenursin_grounding_pad_location');

		$this->alterColumn('et_ophnuintraoperativenursin_details','grounding_pad','text COLLATE utf8_bin');

		$this->delete('ophnuintraoperativenursin_details_viscoelastic_used',"id in (4,5)");
	}
}
