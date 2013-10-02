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
 * This is the model class for table "et_ophnuintraoperativenursin_details".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $viscoelastic_used_id
 * @property integer $nonop_eye_protected_id
 * @property string $grounding_pad
 * @property integer $nasal_or_throat_pack_id
 * @property string $inserted_time
 * @property string $removal_time
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 * @property OphNuIntraoperativenursing_Details_ViscoelasticUsed $viscoelastic_used
 * @property OphNuIntraoperativenursing_Details_NonopEyeProtected $nonop_eye_protected
 * @property OphNuIntraoperativenursing_Details_NasalOrThroatPack $nasal_or_throat_pack
 */

class Element_OphNuIntraoperativenursing_Details extends BaseEventTypeElement
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
		return 'et_ophnuintraoperativenursin_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, viscoelastic_used_id, nonop_eye_protected_id, grounding_pad, nasal_or_throat_pack_id, inserted_time, removal_time, ', 'safe'),
			array('viscoelastic_used_id, nonop_eye_protected_id, grounding_pad, nasal_or_throat_pack_id, inserted_time, removal_time, ', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_id, viscoelastic_used_id, nonop_eye_protected_id, grounding_pad, nasal_or_throat_pack_id, inserted_time, removal_time, ', 'safe', 'on' => 'search'),
			array('inserted_time', 'date', 'format' => 'hh:mm'),
			array('removal_time', 'date', 'format' => 'hh:mm'),
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
			'viscoelastic_used' => array(self::BELONGS_TO, 'OphNuIntraoperativenursing_Details_ViscoelasticUsed', 'viscoelastic_used_id'),
			'nonop_eye_protected' => array(self::BELONGS_TO, 'OphNuIntraoperativenursing_Details_NonopEyeProtected', 'nonop_eye_protected_id'),
			'nasal_or_throat_pack' => array(self::BELONGS_TO, 'OphNuIntraoperativenursing_Details_NasalOrThroatPack', 'nasal_or_throat_pack_id'),
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
			'viscoelastic_used_id' => 'Viscoelastic used',
			'nonop_eye_protected_id' => 'Nonop eye protected',
			'grounding_pad' => 'Grounding pad',
			'nasal_or_throat_pack_id' => 'Nasal or throat pack',
			'inserted_time' => 'Inserted time',
			'removal_time' => 'Removal time',
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
		$criteria->compare('viscoelastic_used_id', $this->viscoelastic_used_id);
		$criteria->compare('nonop_eye_protected_id', $this->nonop_eye_protected_id);
		$criteria->compare('grounding_pad', $this->grounding_pad);
		$criteria->compare('nasal_or_throat_pack_id', $this->nasal_or_throat_pack_id);
		$criteria->compare('inserted_time', $this->inserted_time);
		$criteria->compare('removal_time', $this->removal_time);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}
}
?>
