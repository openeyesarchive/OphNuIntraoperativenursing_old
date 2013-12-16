<?php

class m131205_125154_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophnuintraoperativenursin_details_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`nonop_eye_protected_id` int(10) unsigned NOT NULL,
	`grounding_pad` tinyint(1) unsigned NOT NULL,
	`nasal_or_throat_pack_id` int(10) unsigned NOT NULL,
	`inserted_time` varchar(255) COLLATE utf8_bin DEFAULT '',
	`removal_time` varchar(255) COLLATE utf8_bin DEFAULT '',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`location_id` int(10) unsigned DEFAULT NULL,
	`count_discrepancy` tinyint(1) unsigned NOT NULL,
	`xray_required` tinyint(1) unsigned NOT NULL,
	`specimins_collected` tinyint(1) unsigned NOT NULL,
	`path_form_completed` tinyint(1) unsigned NOT NULL,
	`prep_comments` text COLLATE utf8_bin NOT NULL,
	`dressing_comments` text COLLATE utf8_bin NOT NULL,
	`additional_comments` text COLLATE utf8_bin NOT NULL,
	`implant_comments` text COLLATE utf8_bin NOT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophnuintraoperativenursin_details_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophnuintraoperativenursin_details_cui_fk` (`created_user_id`),
	KEY `acv_et_ophnuintraoperativenursin_details_ev_fk` (`event_id`),
	KEY `acv_ophnuintraoperativenursin_details_nonop_eye_protected_fk` (`nonop_eye_protected_id`),
	KEY `acv_ophnuintraoperativenursin_details_nasal_or_throat_pack_fk` (`nasal_or_throat_pack_id`),
	KEY `acv_et_ophnuintraoperativenursin_details_location_id_fk` (`location_id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_details_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_details_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_details_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_details_location_id_fk` FOREIGN KEY (`location_id`) REFERENCES `ophnuintraoperativenursin_grounding_pad_location` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_details_nasal_or_throat_pack_fk` FOREIGN KEY (`nasal_or_throat_pack_id`) REFERENCES `ophnuintraoperativenursin_details_nasal_or_throat_pack` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_details_nonop_eye_protected_fk` FOREIGN KEY (`nonop_eye_protected_id`) REFERENCES `ophnuintraoperativenursin_details_nonop_eye_protected` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophnuintraoperativenursin_details_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophnuintraoperativenursin_details_version');

		$this->createIndex('et_ophnuintraoperativenursin_details_aid_fk','et_ophnuintraoperativenursin_details_version','id');
		$this->addForeignKey('et_ophnuintraoperativenursin_details_aid_fk','et_ophnuintraoperativenursin_details_version','id','et_ophnuintraoperativenursin_details','id');

		$this->addColumn('et_ophnuintraoperativenursin_details_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophnuintraoperativenursin_details_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophnuintraoperativenursin_details_version','version_id');
		$this->alterColumn('et_ophnuintraoperativenursin_details_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophnuintraoperativenursin_items_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`needles1` varchar(16) COLLATE utf8_bin NOT NULL,
	`needles2` varchar(16) COLLATE utf8_bin NOT NULL,
	`needles3` varchar(16) COLLATE utf8_bin NOT NULL,
	`blades1` varchar(16) COLLATE utf8_bin NOT NULL,
	`blades2` varchar(16) COLLATE utf8_bin NOT NULL,
	`blades3` varchar(16) COLLATE utf8_bin NOT NULL,
	`plugs1` varchar(16) COLLATE utf8_bin NOT NULL,
	`plugs2` varchar(16) COLLATE utf8_bin NOT NULL,
	`plugs3` varchar(16) COLLATE utf8_bin NOT NULL,
	`trocars1` varchar(16) COLLATE utf8_bin NOT NULL,
	`trocars2` varchar(16) COLLATE utf8_bin NOT NULL,
	`trocars3` varchar(16) COLLATE utf8_bin NOT NULL,
	`sponges_gauze1` varchar(16) COLLATE utf8_bin NOT NULL,
	`sponges_gauze2` varchar(16) COLLATE utf8_bin NOT NULL,
	`sponges_gauze3` varchar(16) COLLATE utf8_bin NOT NULL,
	`pledgetts1` varchar(16) COLLATE utf8_bin NOT NULL,
	`pledgetts2` varchar(16) COLLATE utf8_bin NOT NULL,
	`pledgetts3` varchar(16) COLLATE utf8_bin NOT NULL,
	`discrepancies` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`xray_required` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`entered_or` time NOT NULL,
	`time_out` time NOT NULL,
	`surgery_start` time NOT NULL,
	`surgery_stop` time NOT NULL,
	`sign_out` time NOT NULL,
	`left_or` time NOT NULL,
	`scrub_nurse_id` int(10) unsigned NOT NULL,
	`circulating_nurse_id` int(10) unsigned NOT NULL,
	`anaesthetic_nurse_id` int(10) unsigned NOT NULL,
	`wound_classification` text COLLATE utf8_bin NOT NULL,
	PRIMARY KEY (`id`),
	KEY `acv_et_ophnuintraoperativenursin_items_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophnuintraoperativenursin_items_cui_fk` (`created_user_id`),
	KEY `acv_et_ophnuintraoperativenursin_items_ev_fk` (`event_id`),
	KEY `acv_et_ophnuintraoperativenursin_items_scrub_nurse_id_fk` (`scrub_nurse_id`),
	KEY `acv_et_ophnuintraoperativenursin_items_circulating_nurse_id_fk` (`circulating_nurse_id`),
	KEY `acv_et_ophnuintraoperativenursin_items_anaesthetic_nurse_id_fk` (`anaesthetic_nurse_id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_items_anaesthetic_nurse_id_fk` FOREIGN KEY (`anaesthetic_nurse_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_items_circulating_nurse_id_fk` FOREIGN KEY (`circulating_nurse_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_items_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_items_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_items_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnuintraoperativenursin_items_scrub_nurse_id_fk` FOREIGN KEY (`scrub_nurse_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophnuintraoperativenursin_items_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophnuintraoperativenursin_items_version');

		$this->createIndex('et_ophnuintraoperativenursin_items_aid_fk','et_ophnuintraoperativenursin_items_version','id');
		$this->addForeignKey('et_ophnuintraoperativenursin_items_aid_fk','et_ophnuintraoperativenursin_items_version','id','et_ophnuintraoperativenursin_items','id');

		$this->addColumn('et_ophnuintraoperativenursin_items_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophnuintraoperativenursin_items_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophnuintraoperativenursin_items_version','version_id');
		$this->alterColumn('et_ophnuintraoperativenursin_items_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_additional_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_additional_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_additional_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_additional_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_additional_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_additional_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_additional_version');

		$this->createIndex('ophnuintraoperativenursin_additional_aid_fk','ophnuintraoperativenursin_additional_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_additional_aid_fk','ophnuintraoperativenursin_additional_version','id','ophnuintraoperativenursin_additional','id');

		$this->addColumn('ophnuintraoperativenursin_additional_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_additional_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_additional_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_additional_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_additional_assignment_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`additional_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_additional_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_additional_assignment_cui_fk` (`created_user_id`),
	KEY `acv_ophnuintraoperativenursin_additional_assignment_eid_fk` (`element_id`),
	KEY `acv_ophnuintraoperativenursin_additional_assignment_pre_fk` (`additional_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_additional_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_additional_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_additional_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_additional_assignment_pre_fk` FOREIGN KEY (`additional_id`) REFERENCES `ophnuintraoperativenursin_additional` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_additional_assignment_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_additional_assignment_version');

		$this->createIndex('ophnuintraoperativenursin_additional_assignment_aid_fk','ophnuintraoperativenursin_additional_assignment_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_additional_assignment_aid_fk','ophnuintraoperativenursin_additional_assignment_version','id','ophnuintraoperativenursin_additional_assignment','id');

		$this->addColumn('ophnuintraoperativenursin_additional_assignment_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_additional_assignment_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_additional_assignment_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_additional_assignment_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_details_nasal_or_throat_pack_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_uintraoperativenursin_details_nasal_or_throat_pack_lmui_fk` (`last_modified_user_id`),
	KEY `acv_uintraoperativenursin_details_nasal_or_throat_pack_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_uintraoperativenursin_details_nasal_or_throat_pack_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_uintraoperativenursin_details_nasal_or_throat_pack_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_details_nasal_or_throat_pack_version');

		$this->createIndex('ophnuintraoperativenursin_details_nasal_or_throat_pack_aid_fk','ophnuintraoperativenursin_details_nasal_or_throat_pack_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_details_nasal_or_throat_pack_aid_fk','ophnuintraoperativenursin_details_nasal_or_throat_pack_version','id','ophnuintraoperativenursin_details_nasal_or_throat_pack','id');

		$this->addColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_details_nasal_or_throat_pack_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_details_nonop_eye_protected_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_uintraoperativenursin_details_nonop_eye_protected_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_details_nonop_eye_protected_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_uintraoperativenursin_details_nonop_eye_protected_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_details_nonop_eye_protected_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_details_nonop_eye_protected_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_details_nonop_eye_protected_version');

		$this->createIndex('ophnuintraoperativenursin_details_nonop_eye_protected_aid_fk','ophnuintraoperativenursin_details_nonop_eye_protected_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_details_nonop_eye_protected_aid_fk','ophnuintraoperativenursin_details_nonop_eye_protected_version','id','ophnuintraoperativenursin_details_nonop_eye_protected','id');

		$this->addColumn('ophnuintraoperativenursin_details_nonop_eye_protected_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_details_nonop_eye_protected_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_details_nonop_eye_protected_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_details_nonop_eye_protected_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_details_viscoelastic_used_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_details_viscoelastic_used_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_details_viscoelastic_used_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_details_viscoelastic_used_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_details_viscoelastic_used_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_details_viscoelastic_used_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_details_viscoelastic_used_version');

		$this->createIndex('ophnuintraoperativenursin_details_viscoelastic_used_aid_fk','ophnuintraoperativenursin_details_viscoelastic_used_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_details_viscoelastic_used_aid_fk','ophnuintraoperativenursin_details_viscoelastic_used_version','id','ophnuintraoperativenursin_details_viscoelastic_used','id');

		$this->addColumn('ophnuintraoperativenursin_details_viscoelastic_used_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_details_viscoelastic_used_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_details_viscoelastic_used_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_details_viscoelastic_used_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_dressing_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_dressing_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_dressing_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_dressing_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_dressing_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_dressing_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_dressing_version');

		$this->createIndex('ophnuintraoperativenursin_dressing_aid_fk','ophnuintraoperativenursin_dressing_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_dressing_aid_fk','ophnuintraoperativenursin_dressing_version','id','ophnuintraoperativenursin_dressing','id');

		$this->addColumn('ophnuintraoperativenursin_dressing_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_dressing_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_dressing_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_dressing_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_dressing_assignment_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`dressing_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_dressing_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_dressing_assignment_cui_fk` (`created_user_id`),
	KEY `acv_ophnuintraoperativenursin_dressing_assignment_eid_fk` (`element_id`),
	KEY `acv_ophnuintraoperativenursin_dressing_assignment_pre_fk` (`dressing_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_dressing_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_dressing_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_dressing_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_dressing_assignment_pre_fk` FOREIGN KEY (`dressing_id`) REFERENCES `ophnuintraoperativenursin_dressing` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_dressing_assignment_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_dressing_assignment_version');

		$this->createIndex('ophnuintraoperativenursin_dressing_assignment_aid_fk','ophnuintraoperativenursin_dressing_assignment_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_dressing_assignment_aid_fk','ophnuintraoperativenursin_dressing_assignment_version','id','ophnuintraoperativenursin_dressing_assignment','id');

		$this->addColumn('ophnuintraoperativenursin_dressing_assignment_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_dressing_assignment_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_dressing_assignment_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_dressing_assignment_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_grounding_pad_location_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_grounding_pad_location_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_grounding_pad_location_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_grounding_pad_location_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_grounding_pad_location_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_grounding_pad_location_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_grounding_pad_location_version');

		$this->createIndex('ophnuintraoperativenursin_grounding_pad_location_aid_fk','ophnuintraoperativenursin_grounding_pad_location_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_grounding_pad_location_aid_fk','ophnuintraoperativenursin_grounding_pad_location_version','id','ophnuintraoperativenursin_grounding_pad_location','id');

		$this->addColumn('ophnuintraoperativenursin_grounding_pad_location_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_grounding_pad_location_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_grounding_pad_location_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_grounding_pad_location_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_implant_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_implant_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_implant_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_implant_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_implant_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_implant_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_implant_version');

		$this->createIndex('ophnuintraoperativenursin_implant_aid_fk','ophnuintraoperativenursin_implant_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_implant_aid_fk','ophnuintraoperativenursin_implant_version','id','ophnuintraoperativenursin_implant','id');

		$this->addColumn('ophnuintraoperativenursin_implant_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_implant_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_implant_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_implant_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_implant_assignment_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`implant_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_implant_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_implant_assignment_cui_fk` (`created_user_id`),
	KEY `acv_ophnuintraoperativenursin_implant_assignment_eid_fk` (`element_id`),
	KEY `acv_ophnuintraoperativenursin_implant_assignment_pre_fk` (`implant_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_implant_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_implant_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_implant_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_implant_assignment_pre_fk` FOREIGN KEY (`implant_id`) REFERENCES `ophnuintraoperativenursin_implant` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_implant_assignment_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_implant_assignment_version');

		$this->createIndex('ophnuintraoperativenursin_implant_assignment_aid_fk','ophnuintraoperativenursin_implant_assignment_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_implant_assignment_aid_fk','ophnuintraoperativenursin_implant_assignment_version','id','ophnuintraoperativenursin_implant_assignment','id');

		$this->addColumn('ophnuintraoperativenursin_implant_assignment_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_implant_assignment_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_implant_assignment_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_implant_assignment_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_prep_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(32) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_prep_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_prep_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_prep_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_prep_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_prep_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_prep_version');

		$this->createIndex('ophnuintraoperativenursin_prep_aid_fk','ophnuintraoperativenursin_prep_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_prep_aid_fk','ophnuintraoperativenursin_prep_version','id','ophnuintraoperativenursin_prep','id');

		$this->addColumn('ophnuintraoperativenursin_prep_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_prep_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_prep_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_prep_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_prep_assignment_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`prep_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_prep_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_prep_assignment_cui_fk` (`created_user_id`),
	KEY `acv_ophnuintraoperativenursin_prep_assignment_eid_fk` (`element_id`),
	KEY `acv_ophnuintraoperativenursin_prep_assignment_pre_fk` (`prep_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_prep_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_prep_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_prep_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_prep_assignment_pre_fk` FOREIGN KEY (`prep_id`) REFERENCES `ophnuintraoperativenursin_prep` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_prep_assignment_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_prep_assignment_version');

		$this->createIndex('ophnuintraoperativenursin_prep_assignment_aid_fk','ophnuintraoperativenursin_prep_assignment_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_prep_assignment_aid_fk','ophnuintraoperativenursin_prep_assignment_version','id','ophnuintraoperativenursin_prep_assignment','id');

		$this->addColumn('ophnuintraoperativenursin_prep_assignment_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_prep_assignment_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_prep_assignment_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_prep_assignment_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `ophnuintraoperativenursin_viscoelastic_assignment_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`element_id` int(10) unsigned NOT NULL,
	`viscoelastic_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_ophnuintraoperativenursin_viscoelastic_assignment_lmui_fk` (`last_modified_user_id`),
	KEY `acv_ophnuintraoperativenursin_viscoelastic_assignment_cui_fk` (`created_user_id`),
	KEY `acv_ophnuintraoperativenursin_viscoelastic_assignment_eid_fk` (`element_id`),
	KEY `acv_ophnuintraoperativenursin_viscoelastic_assignment_pre_fk` (`viscoelastic_id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_viscoelastic_assignment_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_viscoelastic_assignment_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_viscoelastic_assignment_eid_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnuintraoperativenursin_details` (`id`),
	CONSTRAINT `acv_ophnuintraoperativenursin_viscoelastic_assignment_pre_fk` FOREIGN KEY (`viscoelastic_id`) REFERENCES `ophnuintraoperativenursin_details_viscoelastic_used` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('ophnuintraoperativenursin_viscoelastic_assignment_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','ophnuintraoperativenursin_viscoelastic_assignment_version');

		$this->createIndex('ophnuintraoperativenursin_viscoelastic_assignment_aid_fk','ophnuintraoperativenursin_viscoelastic_assignment_version','id');
		$this->addForeignKey('ophnuintraoperativenursin_viscoelastic_assignment_aid_fk','ophnuintraoperativenursin_viscoelastic_assignment_version','id','ophnuintraoperativenursin_viscoelastic_assignment','id');

		$this->addColumn('ophnuintraoperativenursin_viscoelastic_assignment_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('ophnuintraoperativenursin_viscoelastic_assignment_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','ophnuintraoperativenursin_viscoelastic_assignment_version','version_id');
		$this->alterColumn('ophnuintraoperativenursin_viscoelastic_assignment_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophnuintraoperativenursin_details','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_details_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_items','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnuintraoperativenursin_items_version','deleted','tinyint(1) unsigned not null');

		$this->addColumn('ophnuintraoperativenursin_additional','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_additional_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_additional_assignment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_additional_assignment_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_details_nonop_eye_protected','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_details_nonop_eye_protected_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_details_viscoelastic_used','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_details_viscoelastic_used_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_dressing','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_dressing_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_dressing_assignment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_dressing_assignment_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_grounding_pad_location','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_grounding_pad_location_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_implant','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_implant_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_implant_assignment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_implant_assignment_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_prep','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_prep_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_prep_assignment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_prep_assignment_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_viscoelastic_assignment','deleted','tinyint(1) unsigned not null');
		$this->addColumn('ophnuintraoperativenursin_viscoelastic_assignment_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('ophnuintraoperativenursin_additional','deleted');
		$this->dropColumn('ophnuintraoperativenursin_additional_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_nonop_eye_protected','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_viscoelastic_used','deleted');
		$this->dropColumn('ophnuintraoperativenursin_dressing','deleted');
		$this->dropColumn('ophnuintraoperativenursin_dressing_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_grounding_pad_location','deleted');
		$this->dropColumn('ophnuintraoperativenursin_implant','deleted');
		$this->dropColumn('ophnuintraoperativenursin_implant_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_prep','deleted');
		$this->dropColumn('ophnuintraoperativenursin_prep_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_viscoelastic_assignment','deleted');

		$this->dropColumn('et_ophnuintraoperativenursin_details','deleted');
		$this->dropColumn('et_ophnuintraoperativenursin_items','deleted');

		$this->dropTable('et_ophnuintraoperativenursin_details_version');
		$this->dropTable('et_ophnuintraoperativenursin_items_version');
		$this->dropTable('ophnuintraoperativenursin_additional_version');
		$this->dropTable('ophnuintraoperativenursin_additional_assignment_version');
		$this->dropTable('ophnuintraoperativenursin_details_nasal_or_throat_pack_version');
		$this->dropTable('ophnuintraoperativenursin_details_nonop_eye_protected_version');
		$this->dropTable('ophnuintraoperativenursin_details_viscoelastic_used_version');
		$this->dropTable('ophnuintraoperativenursin_dressing_version');
		$this->dropTable('ophnuintraoperativenursin_dressing_assignment_version');
		$this->dropTable('ophnuintraoperativenursin_grounding_pad_location_version');
		$this->dropTable('ophnuintraoperativenursin_implant_version');
		$this->dropTable('ophnuintraoperativenursin_implant_assignment_version');
		$this->dropTable('ophnuintraoperativenursin_prep_version');
		$this->dropTable('ophnuintraoperativenursin_prep_assignment_version');
		$this->dropTable('ophnuintraoperativenursin_viscoelastic_assignment_version');
	}
}
