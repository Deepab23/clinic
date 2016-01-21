<?php

/**
 * This is the model class for table "questions".
 *
 * The followings are the available columns in table 'questions':
 * @property integer $Id
 * @property string $Title
 * @property string $Description
 * @property integer $Type
 * @property integer $Required
 * @property integer $section
 * @property integer $Status
 */
class Questions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Title,Type, Required, section, Status', 'required'),
			array('Type, Required, section, Status', 'numerical', 'integerOnly'=>true),
			 array('Description,helptext', 'safe'),
			array('Title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Title, Description, Type, Required, section, Status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Title' => 'Title',
			'Description' => 'Option',
			'Type' => 'Type',
			'Required' => 'Required',
			'section' => 'Section',
			'Status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Type',$this->Type);
		$criteria->compare('Required',$this->Required);
		$criteria->compare('section',$this->section);
		$criteria->compare('Status',$this->Status);
		$criteria->order="sort_order";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Questions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
