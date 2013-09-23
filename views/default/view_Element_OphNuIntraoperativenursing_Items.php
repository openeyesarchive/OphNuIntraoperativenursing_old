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
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('needles1'))?></td>
			<td><span class="big"><?php echo $element->needles1?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('needles2'))?></td>
			<td><span class="big"><?php echo $element->needles2?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('needles3'))?></td>
			<td><span class="big"><?php echo $element->needles3?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blades1'))?></td>
			<td><span class="big"><?php echo $element->blades1?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blades2'))?></td>
			<td><span class="big"><?php echo $element->blades2?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('blades3'))?></td>
			<td><span class="big"><?php echo $element->blades3?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('plugs1'))?></td>
			<td><span class="big"><?php echo $element->plugs1?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('plugs2'))?></td>
			<td><span class="big"><?php echo $element->plugs2?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('plugs3'))?></td>
			<td><span class="big"><?php echo $element->plugs3?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('trocars1'))?></td>
			<td><span class="big"><?php echo $element->trocars1?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('trocars2'))?></td>
			<td><span class="big"><?php echo $element->trocars2?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('trocars3'))?></td>
			<td><span class="big"><?php echo $element->trocars3?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sponges_gauze1'))?></td>
			<td><span class="big"><?php echo $element->sponges_gauze1?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sponges_gauze2'))?></td>
			<td><span class="big"><?php echo $element->sponges_gauze2?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('sponges_gauze3'))?></td>
			<td><span class="big"><?php echo $element->sponges_gauze3?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pledgetts1'))?></td>
			<td><span class="big"><?php echo $element->pledgetts1?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pledgetts2'))?></td>
			<td><span class="big"><?php echo $element->pledgetts2?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pledgetts3'))?></td>
			<td><span class="big"><?php echo $element->pledgetts3?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('discrepancies'))?>:</td>
			<td><span class="big"><?php echo $element->discrepancies ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('xray_required'))?>:</td>
			<td><span class="big"><?php echo $element->xray_required ? 'Yes' : 'No'?></span></td>
		</tr>
	</tbody>
</table>
