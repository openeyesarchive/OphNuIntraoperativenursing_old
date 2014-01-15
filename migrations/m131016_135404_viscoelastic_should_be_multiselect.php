<?php

class m131016_135404_viscoelastic_should_be_multiselect extends CDbMigration
{
	public function up()
	{
		$this->createTable('ophnuintraoperativenursin_viscoelastic_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'viscoelastic_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_viscoelastic_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_viscoelastic_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperativenursin_viscoelastic_assignment_eid_fk` (`element_id`)',
				'KEY `ophnuintraoperativenursin_viscoelastic_assignment_pre_fk` (`viscoelastic_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_viscoelastic_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_viscoelastic_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_viscoelastic_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_viscoelastic_assignment_pre_fk` FOREIGN KEY (`viscoelastic_id`) REFERENCES `ophnuintraoperativenursin_details_viscoelastic_used` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

		foreach ($this->dbConnection->createCommand()->select("*")->from("et_ophnuintraoperativenursin_details")->queryAll() as $row) {
			if ($row['viscoelastic_used_id']) {
				$this->insert('ophnuintraoperativenursin_viscoelastic_assignment',array(
					'element_id' => $row['id'],
					'viscoelastic_id' => $row['viscoelastic_used_id'],
				));
			}
		}

		$this->dropForeignKey('ophnuintraoperativenursin_details_viscoelastic_used_fk','et_ophnuintraoperativenursin_details');
		$this->dropIndex('ophnuintraoperativenursin_details_viscoelastic_used_fk','et_ophnuintraoperativenursin_details');
		$this->dropColumn('et_ophnuintraoperativenursin_details','viscoelastic_used_id');
	}

	public function down()
	{
		$this->addColumn('et_ophnuintraoperativenursin_details','viscoelastic_used_id','int(10) unsigned not null');
		$this->createIndex('ophnuintraoperativenursin_details_viscoelastic_used_fk','et_ophnuintraoperativenursin_details','viscoelastic_used_id');
		$this->addForeignKey('ophnuintraoperativenursin_details_viscoelastic_used_fk','et_ophnuintraoperativenursin_details','viscoelastic_used_id','ophnuintraoperativenursin_details_viscoelastic_used','id');

		$this->dropTable('ophnuintraoperativenursin_viscoelastic_assignment');
	}
}
