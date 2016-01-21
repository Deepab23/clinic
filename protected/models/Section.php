<?php

/**
 * This is the model class for table "section".
 *
 * The followings are the available columns in table 'section':
 * @property integer $Id
 * @property string $Title
 * @property string $Description
 * @property string $Video
 * @property string $Resource
 * @property integer $XOrder
 * @property integer $Status
 * @property string $Createdon
 */
class Section extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'section';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Title,Status', 'required'),
			array('Video, Resource, XOrder', 'safe'),
			array('XOrder, Status', 'numerical', 'integerOnly'=>true),
			array('Title', 'length', 'max'=>255),
			array('Video', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, Title, Description, Video, Resource, XOrder, Status, Createdon', 'safe', 'on'=>'search'),
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
			'Description' => 'Description',
			'Video' => 'Video',
			'Resource' => 'Resource',
			'XOrder' => 'Xorder',
			'Status' => 'Status',
			'Createdon' => 'Createdon',
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
		$criteria->compare('Video',$this->Video,true);
		$criteria->compare('Resource',$this->Resource,true);
		$criteria->compare('XOrder',$this->XOrder);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Createdon',$this->Createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Section the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
