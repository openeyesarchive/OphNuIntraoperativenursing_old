<?php

class m131210_144544_soft_deletion extends CDbMigration
{
	public function up()
	{
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
		$this->dropColumn('ophnuintraoperativenursin_additional_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_additional_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_additional_assignment_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_nasal_or_throat_pack_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_nonop_eye_protected','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_nonop_eye_protected_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_viscoelastic_used','deleted');
		$this->dropColumn('ophnuintraoperativenursin_details_viscoelastic_used_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_dressing','deleted');
		$this->dropColumn('ophnuintraoperativenursin_dressing_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_dressing_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_dressing_assignment_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_grounding_pad_location','deleted');
		$this->dropColumn('ophnuintraoperativenursin_grounding_pad_location_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_implant','deleted');
		$this->dropColumn('ophnuintraoperativenursin_implant_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_implant_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_implant_assignment_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_prep','deleted');
		$this->dropColumn('ophnuintraoperativenursin_prep_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_prep_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_prep_assignment_version','deleted');
		$this->dropColumn('ophnuintraoperativenursin_viscoelastic_assignment','deleted');
		$this->dropColumn('ophnuintraoperativenursin_viscoelastic_assignment_version','deleted');
	}
}
