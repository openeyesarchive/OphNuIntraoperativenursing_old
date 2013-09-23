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

/**
 * This is the model class for table "et_ophnuintraoperativenursin_items".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $needles1
 * @property integer $needles2
 * @property integer $needles3
 * @property integer $blades1
 * @property integer $blades2
 * @property integer $blades3
 * @property integer $plugs1
 * @property integer $plugs2
 * @property integer $plugs3
 * @property integer $trocars1
 * @property integer $trocars2
 * @property integer $trocars3
 * @property integer $sponges_gauze1
 * @property integer $sponges_gauze2
 * @property integer $sponges_gauze3
 * @property integer $pledgetts1
 * @property integer $pledgetts2
 * @property integer $pledgetts3
 * @property integer $discrepancies
 * @property integer $xray_required
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphNuIntraoperativenursing_Items extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophnuintraoperativenursin_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, needles1, needles2, needles3, blades1, blades2, blades3, plugs1, plugs2, plugs3, trocars1, trocars2, trocars3, sponges_gauze1, sponges_gauze2, sponges_gauze3, pledgetts1, pledgetts2, pledgetts3, discrepancies, xray_required, ', 'safe'),
			array('needles1, needles2, needles3, blades1, blades2, blades3, plugs1, plugs2, plugs3, trocars1, trocars2, trocars3, sponges_gauze1, sponges_gauze2, sponges_gauze3, pledgetts1, pledgetts2, pledgetts3, discrepancies, xray_required, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, needles1, needles2, needles3, blades1, blades2, blades3, plugs1, plugs2, plugs3, trocars1, trocars2, trocars3, sponges_gauze1, sponges_gauze2, sponges_gauze3, pledgetts1, pledgetts2, pledgetts3, discrepancies, xray_required, ', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'needles1' => 'Needles 1',
			'needles2' => 'Needles 2',
			'needles3' => 'Needles 3',
			'blades1' => 'Blades 1',
			'blades2' => 'Blades 2',
			'blades3' => 'Blades 3',
			'plugs1' => 'Plugs 1',
			'plugs2' => 'Plugs 2',
			'plugs3' => 'Plugs 3',
			'trocars1' => 'Trocars 1',
			'trocars2' => 'Trocars 2',
			'trocars3' => 'Trocars 3',
			'sponges_gauze1' => 'Sponges Gauze 1',
			'sponges_gauze2' => 'Sponges Gauze 2',
			'sponges_gauze3' => 'Sponges Gauze 3',
			'pledgetts1' => 'Pledgetts 1',
			'pledgetts2' => 'Pledgetts 2',
			'pledgetts3' => 'Pledgetts 3',
			'discrepancies' => 'Discrepancies',
			'xray_required' => 'XRay required',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		$criteria->compare('needles1', $this->needles1);
		$criteria->compare('needles2', $this->needles2);
		$criteria->compare('needles3', $this->needles3);
		$criteria->compare('blades1', $this->blades1);
		$criteria->compare('blades2', $this->blades2);
		$criteria->compare('blades3', $this->blades3);
		$criteria->compare('plugs1', $this->plugs1);
		$criteria->compare('plugs2', $this->plugs2);
		$criteria->compare('plugs3', $this->plugs3);
		$criteria->compare('trocars1', $this->trocars1);
		$criteria->compare('trocars2', $this->trocars2);
		$criteria->compare('trocars3', $this->trocars3);
		$criteria->compare('sponges_gauze1', $this->sponges_gauze1);
		$criteria->compare('sponges_gauze2', $this->sponges_gauze2);
		$criteria->compare('sponges_gauze3', $this->sponges_gauze3);
		$criteria->compare('pledgetts1', $this->pledgetts1);
		$criteria->compare('pledgetts2', $this->pledgetts2);
		$criteria->compare('pledgetts3', $this->pledgetts3);
		$criteria->compare('discrepancies', $this->discrepancies);
		$criteria->compare('xray_required', $this->xray_required);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}



	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{

		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}
}
?>