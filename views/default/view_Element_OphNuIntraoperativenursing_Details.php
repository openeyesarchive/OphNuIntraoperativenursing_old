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

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%">Viscoelastic used:</td>
			<td><span class="big">
				<?php if ($element->viscoelasticItems) {
					foreach ($element->viscoelasticItems as $i => $item) {
						if ($i >0) echo ", ";
						echo $item->viscoelastic->name;
					}
				}?>
			</td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('nonop_eye_protected_id'))?></td>
			<td><span class="big"><?php echo $element->nonop_eye_protected ? $element->nonop_eye_protected->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('grounding_pad'))?></td>
			<td><span class="big"><?php echo $element->grounding_pad ? 'Yes, '.$element->groundingPad->name : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('nasal_or_throat_pack_id'))?></td>
			<td><span class="big"><?php echo $element->nasal_or_throat_pack ? $element->nasal_or_throat_pack->name : 'None'?></span></td>
		</tr>
		<?php if ($element->nasal_or_throat_pack && in_array($element->nasal_or_throat_pack->name,array('Nasal','Throat'))) {?>
			<tr>
				<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('inserted_time'))?></td>
				<td><span class="big"><?php echo CHtml::encode($element->inserted_time)?></span></td>
			</tr>
			<tr>
				<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('removal_time'))?></td>
				<td><span class="big"><?php echo CHtml::encode($element->removal_time)?></span></td>
			</tr>
		<?php }?>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('count_discrepancy'))?></td>
			<td><span class="big"><?php echo $element->count_discrepancy ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('xray_required'))?></td>
			<td><span class="big"><?php echo $element->xray_required ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('specimins_collected'))?></td>
			<td><span class="big"><?php echo $element->specimins_collected ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('path_form_completed'))?></td>
			<td><span class="big"><?php echo $element->path_form_completed ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%">Prep:</td>
			<td><span class="big">
				<?php if ($element->prepItems) {
					foreach ($element->prepItems as $i => $item) {
						if ($i >0) echo ", ";
						echo $item->prep->name;
					}
				}?><?php if ($element->prep_comments) {
					if ($element->prepItems) echo ", ";
					echo $element->prep_comments;
				}?>
			</td>
		</tr>
		<tr>
			<td width="30%">Dressing:</td>
			<td><span class="big">
				<?php if ($element->dressingItems) {
					foreach ($element->dressingItems as $i => $item) {
						if ($i >0) echo ", ";
						echo $item->dressing->name;
					}
				}?><?php if ($element->dressing_comments) {
					if ($element->dressingItems) echo ", ";
					echo $element->dressing_comments;
				}?>
			</td>
		</tr>
		<tr>
			<td width="30%">Additional:</td>
			<td><span class="big">
				<?php if ($element->additionalItems) {
					foreach ($element->additionalItems as $i => $item) {
						if ($i >0) echo ", ";
						echo $item->additional->name;
					}
				}?><?php if ($element->additional_comments) {
					if ($element->additionalItems) echo ", ";
					echo $element->additional_comments;
				}?>
			</td>
		</tr>
		<tr>
			<td width="30%">Implant/prosthesis/scleral buckle:</td>
			<td><span class="big">
				<?php if ($element->implantItems) {
					foreach ($element->implantItems as $i => $item) {
						if ($i >0) echo ", ";
						echo $item->implant->name;
					}
				}?><?php if ($element->implant_comments) {
					if ($element->implantItems) echo ", ";
					echo $element->implant_comments;
				}?>
			</td>
		</tr>
	</tbody>
</table>
