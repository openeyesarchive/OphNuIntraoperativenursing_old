<?php 
class m130923_141207_event_type_OphNuIntraoperativenursing extends CDbMigration
{
	public function up()
	{
		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuIntraoperativenursing', 'name' => 'Intraoperative Nursing','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Items',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Items','class_name' => 'Element_OphNuIntraoperativenursing_Items', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Items'))->queryRow();
		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Details',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Details','class_name' => 'Element_OphNuIntraoperativenursing_Details', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Details'))->queryRow();



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraoperativenursin_items', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'needles1' => 'int(10) unsigned NULL', // Needles 1
				'needles2' => 'int(10) unsigned NULL', // Needles 2
				'needles3' => 'int(10) unsigned NULL', // Needles 3
				'blades1' => 'int(10) unsigned NULL', // Blades 1
				'blades2' => 'int(10) unsigned NULL', // Blades 2
				'blades3' => 'int(10) unsigned NULL', // Blades 3
				'plugs1' => 'int(10) unsigned NULL', // Plugs 1
				'plugs2' => 'int(10) unsigned NULL', // Plugs 2
				'plugs3' => 'int(10) unsigned NULL', // Plugs 3
				'trocars1' => 'int(10) unsigned NULL', // Trocars 1
				'trocars2' => 'int(10) unsigned NULL', // Trocars 2
				'trocars3' => 'int(10) unsigned NULL', // Trocars 3
				'sponges_gauze1' => 'int(10) unsigned NULL', // Sponges Gauze 1
				'sponges_gauze2' => 'int(10) unsigned NULL', // Sponges Gauze 2
				'sponges_gauze3' => 'int(10) unsigned NULL', // Sponges Gauze 3
				'pledgetts1' => 'int(10) unsigned NULL', // Pledgetts 1
				'pledgetts2' => 'int(10) unsigned NULL', // Pledgetts 2
				'pledgetts3' => 'int(10) unsigned NULL', // Pledgetts 3
				'discrepancies' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Discrepancies
				'xray_required' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // XRay required
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperativenursin_items_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperativenursin_items_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperativenursin_items_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_items_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_items_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_items_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		// element lookup table ophnuintraoperativenursin_details_viscoelastic_used
		$this->createTable('ophnuintraoperativenursin_details_viscoelastic_used', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_details_viscoelastic_used_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_details_viscoelastic_used_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_viscoelastic_used_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_viscoelastic_used_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperativenursin_details_viscoelastic_used',array('name'=>'Healon','display_order'=>1));
		$this->insert('ophnuintraoperativenursin_details_viscoelastic_used',array('name'=>'Healon GV','display_order'=>2));
		$this->insert('ophnuintraoperativenursin_details_viscoelastic_used',array('name'=>'HPMC','display_order'=>3));

		// element lookup table ophnuintraoperativenursin_details_nonop_eye_protected
		$this->createTable('ophnuintraoperativenursin_details_nonop_eye_protected', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_details_nonop_eye_protected_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_details_nonop_eye_protected_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_nonop_eye_protected_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_nonop_eye_protected_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperativenursin_details_nonop_eye_protected',array('name'=>'Tape','display_order'=>1));
		$this->insert('ophnuintraoperativenursin_details_nonop_eye_protected',array('name'=>'Shield','display_order'=>2));
		$this->insert('ophnuintraoperativenursin_details_nonop_eye_protected',array('name'=>'NA','display_order'=>3));

		// element lookup table ophnuintraoperativenursin_details_nasal_or_throat_pack
		$this->createTable('ophnuintraoperativenursin_details_nasal_or_throat_pack', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnuintraoperativenursin_details_nasal_or_throat_pack_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnuintraoperativenursin_details_nasal_or_throat_pack_cui_fk` (`created_user_id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_nasal_or_throat_pack_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_nasal_or_throat_pack_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('ophnuintraoperativenursin_details_nasal_or_throat_pack',array('name'=>'Nasal','display_order'=>1));
		$this->insert('ophnuintraoperativenursin_details_nasal_or_throat_pack',array('name'=>'Throat','display_order'=>2));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnuintraoperativenursin_details', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'viscoelastic_used_id' => 'int(10) unsigned NOT NULL', // Viscoelastic used
				'nonop_eye_protected_id' => 'int(10) unsigned NOT NULL', // Nonop eye protected
				'grounding_pad' => 'text COLLATE utf8_bin DEFAULT \'\'', // Grounding pad
				'nasal_or_throat_pack_id' => 'int(10) unsigned NOT NULL', // Nasal or throat pack
				'inserted_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Inserted time
				'removal_time' => 'varchar(255) COLLATE utf8_bin DEFAULT \'\'', // Removal time
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnuintraoperativenursin_details_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnuintraoperativenursin_details_cui_fk` (`created_user_id`)',
				'KEY `et_ophnuintraoperativenursin_details_ev_fk` (`event_id`)',
				'KEY `ophnuintraoperativenursin_details_viscoelastic_used_fk` (`viscoelastic_used_id`)',
				'KEY `ophnuintraoperativenursin_details_nonop_eye_protected_fk` (`nonop_eye_protected_id`)',
				'KEY `ophnuintraoperativenursin_details_nasal_or_throat_pack_fk` (`nasal_or_throat_pack_id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_details_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_details_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnuintraoperativenursin_details_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_viscoelastic_used_fk` FOREIGN KEY (`viscoelastic_used_id`) REFERENCES `ophnuintraoperativenursin_details_viscoelastic_used` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_nonop_eye_protected_fk` FOREIGN KEY (`nonop_eye_protected_id`) REFERENCES `ophnuintraoperativenursin_details_nonop_eye_protected` (`id`)',
				'CONSTRAINT `ophnuintraoperativenursin_details_nasal_or_throat_pack_fk` FOREIGN KEY (`nasal_or_throat_pack_id`) REFERENCES `ophnuintraoperativenursin_details_nasal_or_throat_pack` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down()
	{
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophnuintraoperativenursin_items');



		$this->dropTable('et_ophnuintraoperativenursin_details');


		$this->dropTable('ophnuintraoperativenursin_details_viscoelastic_used');
		$this->dropTable('ophnuintraoperativenursin_details_nonop_eye_protected');
		$this->dropTable('ophnuintraoperativenursin_details_nasal_or_throat_pack');


		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuIntraoperativenursing'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphNuIntraoperativenursing does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}

