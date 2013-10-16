<?php

class m131016_104250_changes_for_orbis extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('et_ophnuintraoperativenursin_items','eye_protected');

		$this->alterColumn('et_ophnuintraoperativenursin_details','viscoelastic_used_id','int(10) unsigned null');

		$this->addColumn('et_ophnuintraoperativenursin_items','wound_classification','text collate utf8_bin not null');

		$this->createTable('ophnuintraoperativenursin_prep', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) collate utf8_bin not null',
				'display_order' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_prep_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_prep_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_prep_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_prep_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperativenursin_prep',array('id'=>1,'name'=>'Betadine 5%','display_order'=>1));
		$this->insert('ophnuintraoperativenursin_prep',array('id'=>2,'name'=>'Betadine 10%','display_order'=>2));
		$this->insert('ophnuintraoperativenursin_prep',array('id'=>3,'name'=>'Aqueous chlorexidine','display_order'=>3));

		$this->createTable('ophnuintraoperativenursin_prep_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'prep_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_prep_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_prep_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperativenursin_prep_assignment_eid_fk` (`element_id`)',
				'KEY `ophnuintraoperativenursin_prep_assignment_pre_fk` (`prep_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_prep_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_prep_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_prep_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_prep_assignment_pre_fk` FOREIGN KEY (`prep_id`) REFERENCES `ophnuintraoperativenursin_prep` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperativenursin_dressing', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) collate utf8_bin not null',
				'display_order' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_dressing_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_dressing_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_dressing_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_dressing_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperativenursin_dressing',array('id'=>1,'name'=>'Eye pad','display_order'=>1));
		$this->insert('ophnuintraoperativenursin_dressing',array('id'=>2,'name'=>'Eye shield','display_order'=>2));
		$this->insert('ophnuintraoperativenursin_dressing',array('id'=>3,'name'=>'Steri-strips','display_order'=>3));
		$this->insert('ophnuintraoperativenursin_dressing',array('id'=>4,'name'=>'Ointment','display_order'=>4));
		$this->insert('ophnuintraoperativenursin_dressing',array('id'=>5,'name'=>'Dry','display_order'=>5));
		$this->insert('ophnuintraoperativenursin_dressing',array('id'=>6,'name'=>'Wet','display_order'=>6));

		$this->createTable('ophnuintraoperativenursin_dressing_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'dressing_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_dressing_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_dressing_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperativenursin_dressing_assignment_eid_fk` (`element_id`)',
				'KEY `ophnuintraoperativenursin_dressing_assignment_pre_fk` (`dressing_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_dressing_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_dressing_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_dressing_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_dressing_assignment_pre_fk` FOREIGN KEY (`dressing_id`) REFERENCES `ophnuintraoperativenursin_dressing` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperativenursin_additional', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) collate utf8_bin not null',
				'display_order' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_additional_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_additional_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_additional_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_additional_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperativenursin_additional',array('id'=>1,'name'=>'Vision blue','display_order'=>1));
		$this->insert('ophnuintraoperativenursin_additional',array('id'=>2,'name'=>'ICG','display_order'=>2));
		$this->insert('ophnuintraoperativenursin_additional',array('id'=>3,'name'=>'Xylocaine','display_order'=>3));
		$this->insert('ophnuintraoperativenursin_additional',array('id'=>4,'name'=>'Sub-conjunctival injection','display_order'=>4));
		$this->insert('ophnuintraoperativenursin_additional',array('id'=>5,'name'=>'Mitomycin','display_order'=>5));
		$this->insert('ophnuintraoperativenursin_additional',array('id'=>6,'name'=>'Intravitreal injections','display_order'=>6));
		$this->insert('ophnuintraoperativenursin_additional',array('id'=>7,'name'=>'5FU','display_order'=>7));

		$this->createTable('ophnuintraoperativenursin_additional_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'additional_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_additional_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_additional_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperativenursin_additional_assignment_eid_fk` (`element_id`)',
				'KEY `ophnuintraoperativenursin_additional_assignment_pre_fk` (`additional_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_additional_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_additional_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_additional_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_additional_assignment_pre_fk` FOREIGN KEY (`additional_id`) REFERENCES `ophnuintraoperativenursin_additional` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->createTable('ophnuintraoperativenursin_implant', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(32) collate utf8_bin not null',
				'display_order' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_implant_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_implant_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_implant_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_implant_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperativenursin_implant',array('id'=>1,'name'=>'Intraocular lens','display_order'=>1));
		$this->insert('ophnuintraoperativenursin_implant',array('id'=>2,'name'=>'Ocular sphere ball','display_order'=>2));
		$this->insert('ophnuintraoperativenursin_implant',array('id'=>3,'name'=>'Glaucoma valve','display_order'=>3));
		$this->insert('ophnuintraoperativenursin_implant',array('id'=>4,'name'=>'Lid weights','display_order'=>4));
		$this->insert('ophnuintraoperativenursin_implant',array('id'=>5,'name'=>'Sutures','display_order'=>5));
		$this->insert('ophnuintraoperativenursin_implant',array('id'=>6,'name'=>'Drains','display_order'=>6));

		$this->createTable('ophnuintraoperativenursin_implant_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned not null',
				'implant_id' => 'int(10) unsigned not null',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_implant_assignment_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_implant_assignment_cui_fk` (`created_user_id`)',
				'KEY `ophnuintraoperativenursin_implant_assignment_eid_fk` (`element_id`)',
				'KEY `ophnuintraoperativenursin_implant_assignment_pre_fk` (`implant_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_implant_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_implant_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_implant_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_implant_assignment_pre_fk` FOREIGN KEY (`implant_id`) REFERENCES `ophnuintraoperativenursin_implant` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->addColumn('et_ophnuintraoperativenursin_details','prep_comments','text collate utf8_bin not null');
		$this->addColumn('et_ophnuintraoperativenursin_details','dressing_comments','text collate utf8_bin not null');
		$this->addColumn('et_ophnuintraoperativenursin_details','additional_comments','text collate utf8_bin not null');
		$this->addColumn('et_ophnuintraoperativenursin_details','implant_comments','text collate utf8_bin not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnuintraoperativenursin_details','implant_comments');
		$this->dropColumn('et_ophnuintraoperativenursin_details','additional_comments');
		$this->dropColumn('et_ophnuintraoperativenursin_details','dressing_comments');
		$this->dropColumn('et_ophnuintraoperativenursin_details','prep_comments');

		$this->dropTable('ophnuintraoperativenursin_implant_assignment');
		$this->dropTable('ophnuintraoperativenursin_implant');
		$this->dropTable('ophnuintraoperativenursin_additional_assignment');
		$this->dropTable('ophnuintraoperativenursin_additional');
		$this->dropTable('ophnuintraoperativenursin_dressing_assignment');
		$this->dropTable('ophnuintraoperativenursin_dressing');
		$this->dropTable('ophnuintraoperativenursin_prep_assignment');
		$this->dropTable('ophnuintraoperativenursin_prep');

		$this->dropColumn('et_ophnuintraoperativenursin_items','wound_classification');

		$this->alterColumn('et_ophnuintraoperativenursin_details','viscoelastic_used_id','int(10) unsigned not null');

		$this->addColumn('et_ophnuintraoperativenursin_items','eye_protected','varchar(64) collate utf8_bin not null');
	}
}
