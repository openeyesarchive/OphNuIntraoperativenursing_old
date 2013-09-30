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

<table class="eventDetail preoperativeChecklist" style="margin-left: 10px;">
	<tr>
		<th>COUNTABLE ITEMS</th>
		<th>First count</th>
		<th>Second count / sign out</th>
		<th>Final count</th>
	</tr>
	<tr>
		<th>Needles</th>
		<td><?php echo $element->needles1?></td>
		<td><?php echo $element->needles2?></td>
		<td><?php echo $element->needles3?></td>
	</tr>
	<tr>
		<th>Blades</th>
		<td><?php echo $element->blades1?></td>
		<td><?php echo $element->blades2?></td>
		<td><?php echo $element->blades3?></td>
	</tr>
	<tr>
		<th>Plugs</th>
		<td><?php echo $element->plugs1?></td>
		<td><?php echo $element->plugs2?></td>
		<td><?php echo $element->plugs3?></td>
	</tr>
	<tr>
		<th>Trocars</th>
		<td><?php echo $element->trocars1?></td>
		<td><?php echo $element->trocars2?></td>
		<td><?php echo $element->trocars3?></td>
	</tr>
	<tr>
		<th>Sponges/Gauze</th>
		<td><?php echo $element->sponges_gauze1?></td>
		<td><?php echo $element->sponges_gauze2?></td>
		<td><?php echo $element->sponges_gauze3?></td>
	</tr>
	<tr>
		<th>Pledgetts</th>
		<td><?php echo $element->pledgetts1?></td>
		<td><?php echo $element->pledgetts2?></td>
		<td><?php echo $element->pledgetts3?></td>
	</tr>
</table>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('discrepancies'))?>:</td>
			<td><span class="big"><?php echo $element->discrepancies ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('xray_required'))?>:</td>
			<td><span class="big"><?php echo $element->xray_required ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('entered_or'))?>:</td>
			<td><span class="big"><?php echo $element->entered_or?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('time_out'))?>:</td>
			<td><span class="big"><?php echo $element->time_out?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgery_start'))?>:</td>
			<td><span class="big"><?php echo $element->surgery_start?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgery_stop'))?>:</td>
			<td><span class="big"><?php echo $element->surgery_stop?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sign_out'))?>:</td>
			<td><span class="big"><?php echo $element->sign_out?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('left_or'))?>:</td>
			<td><span class="big"><?php echo $element->left_or?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('scrub_nurse_id'))?>:</td>
			<td><span class="big"><?php echo $element->scrub_nurse->fullName?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('circulating_nurse_id'))?>:</td>
			<td><span class="big"><?php echo $element->circulating_nurse->fullName?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anaesthetic_nurse_id'))?>:</td>
			<td><span class="big"><?php echo $element->anaesthetic_nurse->fullName?></span></td>
		</tr>
	</tbody>
</table>
