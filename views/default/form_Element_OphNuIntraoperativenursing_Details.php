<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<h4 class="elementTypeName"><?php echo $element->elementType->name; ?></h4>

	<?php echo $form->dropDownList($element, 'viscoelastic_used_id', CHtml::listData(OphNuIntraoperativenursing_Details_ViscoelasticUsed::model()->findAll(array('order'=>'display_order')),'id','name'),array('empty'=>'N/A'))?>
	<?php echo $form->radioButtons($element, 'nonop_eye_protected_id', 'ophnuintraoperativenursin_details_nonop_eye_protected')?>
	<?php echo $form->radioBoolean($element, 'grounding_pad')?>
	<?php echo $form->radioButtons($element, 'location_id', 'ophnuintraoperativenursin_grounding_pad_location', null, false, $this->locationHidden($element))?>
	<?php echo $form->radioButtons($element, 'nasal_or_throat_pack_id', 'ophnuintraoperativenursin_details_nasal_or_throat_pack')?>
	<?php echo $form->textField($element, 'inserted_time', array('size' => '6', 'hide' => $this->timeFieldsHidden($element)),array('links'=>array('title'=>'now','href'=>'#','id'=>'inserted_now')))?>
	<?php echo $form->textField($element, 'removal_time', array('size' => '6', 'hide' => $this->timeFieldsHidden($element)),array('links'=>array('title'=>'now','href'=>'#','id'=>'removal_now')))?>
	<?php echo $form->radioBoolean($element, 'count_discrepancy')?>
	<?php echo $form->radioBoolean($element, 'xray_required')?>
	<?php echo $form->radioBoolean($element, 'specimins_collected')?>
	<?php echo $form->radioBoolean($element, 'path_form_completed')?>
	<?php echo $form->multiSelectList($element, 'Prep', 'prepItems', 'prep_id', CHtml::listData(OphNuIntraoperativenursing_Prep::model()->findAll(array('order'=>'display_order')),'id','name'), array(), array('label'=>'Prep','empty'=>'- Select -','textField'=>'prep_comments','width'=>'13.5em'))?>
	<?php echo $form->multiSelectList($element, 'Dressing', 'dressingItems', 'dressing_id', CHtml::listData(OphNuIntraoperativenursing_Dressing::model()->findAll(array('order'=>'display_order')),'id','name'), array(), array('label'=>'Dressing','empty'=>'- Select -','textField'=>'dressing_comments','width'=>'13.5em'))?>
	<?php echo $form->multiSelectList($element, 'Additional', 'additionalItems', 'additional_id', CHtml::listData(OphNuIntraoperativenursing_Additional::model()->findAll(array('order'=>'display_order')),'id','name'), array(), array('label'=>'Additional','empty'=>'- Select -','textField'=>'additional_comments','width'=>'13.5em'))?>
	<?php echo $form->multiSelectList($element, 'Implant', 'implantItems', 'implant_id', CHtml::listData(OphNuIntraoperativenursing_Implant::model()->findAll(array('order'=>'display_order')),'id','name'), array(), array('label'=>'Implant/prosthesis/scleral buckle','empty'=>'- Select -','textField'=>'implant_comments','width'=>'13.5em'))?>
</div>
