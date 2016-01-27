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
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
