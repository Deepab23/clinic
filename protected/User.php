<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property string $Pasword
 * @property string $EB
 * @property string $EC
 * @property string $EE
 * @property string $DOH
 * @property integer $Office
 * @property integer $Role
 * @property string $About
 * @property string $Createdon
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	
	
	public function defaultScope()
{
    $alias = $this->getTableAlias(false,false);
	if(isset($_SESSION['user']['Role'])){
	if($_SESSION['user']['Role']!=1){
		 
		$of=$_SESSION['user']['Office'];
		 return array(
        'condition'=>"`$alias`.`Office` = $of and `$alias`.`Role`=3",
    );
	
	}
	}
    
}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FirstName, LastName, Email, Pasword, DOH, Office, Role', 'required'),
			array('Office, Role', 'numerical', 'integerOnly'=>true),
			array('FirstName, LastName, Email, Pasword, EB, DOH', 'length', 'max'=>255),
			array('EC, EE', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, FirstName, LastName, Email, Pasword, EB, EC, EE, DOH, Office, Role, About, Createdon', 'safe', 'on'=>'search'),
			 array('Createdon','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert')
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
			'id' => 'ID',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'Email' => 'Email',
			'Pasword' => 'Password',
			'EB' => 'Bachelor of Kinesiology',
			'EC' => 'Certified	
  Exercise	
  Physiologist',
			'EE' => 'Exercise	
  Specialist',
			'DOH' => 'Date of Hiring',
			'Office' => 'Office',
			'Role' => 'Role',
			'About' => 'About',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Pasword',$this->Pasword,true);
		$criteria->compare('EB',$this->EB,true);
		$criteria->compare('EC',$this->EC,true);
		$criteria->compare('EE',$this->EE,true);
		$criteria->compare('DOH',$this->DOH,true);
		$criteria->compare('Office',$this->Office);
		$criteria->compare('Role',$this->Role);
		$criteria->compare('About',$this->About,true);
		$criteria->compare('Createdon',$this->Createdon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
