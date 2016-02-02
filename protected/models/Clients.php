<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $id
 * @property string $FirstName
 * @property string $LastName
 * @property integer $location
 * @property integer $theripiest
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $gender
 * @property string $dob
 * @property string $inurancecompany
 * @property string $injurydate
 * @property string $therapy_start_date
 * @property string $ASIA
 * @property string $injury
 * @property string $medication
 * @property string $notes
 */
class Clients extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FirstName, LastName, location, theripiest, phone, email, address, gender, dob, inurancecompany, injurydate, therapy_start_date, ASIA, injury, medication, notes', 'required'),
			array('location, theripiest', 'numerical', 'integerOnly'=>true),
			array('FirstName, LastName, email', 'length', 'max'=>255),
			array('phone, gender, dob, inurancecompany, injurydate, therapy_start_date, ASIA, injury', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, FirstName, LastName, location, theripiest, phone, email, address, gender, dob, inurancecompany, injurydate, therapy_start_date, ASIA, injury, medication, notes', 'safe', 'on'=>'search'),
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
			'location' => 'Location',
			'theripiest' => 'Theripiest',
			'phone' => 'Phone',
			'email' => 'Email',
			'address' => 'Address',
			'gender' => 'Gender',
			'dob' => 'Date of Birth',
			'inurancecompany' => 'Insurance Company',
			'injurydate' => 'Injury date',
			'therapy_start_date' => 'Therapy Start Date',
			'ASIA' => 'ASIA',
			'injury' => 'Injury',
			'medication' => 'Medication',
			'notes' => 'Notes',
		);
	}
	
	
		public function defaultScope()
{
    $alias = $this->getTableAlias(false,false);
	if(isset($_SESSION['user']['Role'])){
	if($_SESSION['user']['Role']!=1){
		 
		$of=$_SESSION['user']['Office'];
		 return array(
        'condition'=>"`$alias`.`location` = $of",
    );
	
	}
	}
    
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
		$criteria->compare('location',$this->location);
		$criteria->compare('theripiest',$this->theripiest);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('inurancecompany',$this->inurancecompany,true);
		$criteria->compare('injurydate',$this->injurydate,true);
		$criteria->compare('therapy_start_date',$this->therapy_start_date,true);
		$criteria->compare('ASIA',$this->ASIA,true);
		$criteria->compare('injury',$this->injury,true);
		$criteria->compare('medication',$this->medication,true);
		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clients the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
