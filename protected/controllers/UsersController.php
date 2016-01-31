<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	
	public function actionGetTharepistByLoc()
	{
		$loc=$_POST['location'];
		$Criteria = new CDbCriteria();
        $Criteria->condition = "office=$loc and Role='3'";
		$loc=Users::model()->findAll($Criteria);
		foreach($loc as $l){
			echo "<option value='$l->id'> $l->FirstName $l->LastName </option>";
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$criteria = new CDbCriteria;
$criteria->order = 'name ASC';
$locations = Location::model()->findAll($criteria);
$data= CHtml::listData($locations, 'id', 'name');

		$this->render('create',array(
			'model'=>$model,'locations'=>$data
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('index'));
		}
		
				$criteria = new CDbCriteria;
$criteria->order = 'name ASC';
$locations = Location::model()->findAll($criteria);
$data= CHtml::listData($locations, 'id', 'name');

		$this->render('update',array(
			'model'=>$model,'locations'=>$data
		));

	
	}
	
	
	
	
	public function actionEdit()
	{
		$id=Yii::app()->user->id;
		
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('site/dasboard'));
		}
		
				$criteria = new CDbCriteria;
$criteria->order = 'name ASC';
$locations = Location::model()->findAll($criteria);
$data= CHtml::listData($locations, 'id', 'name');

		$this->render('edit',array(
			'model'=>$model,'locations'=>$data
		));

	
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
		/**	
  	
  Permissions:	
   -­‐ Executives:	
  can	
  a
	 * Manages all models.
	 */
	public function actionTherapists()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];
		$model->attributes=array('Role'=>3);

		$this->render('therapist',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
			public function actionChangePassword($id){
		
		
		$op=$_POST['opassword'];
		$p=$_POST['password'];
		$user=Users::model()->findByPk($id);
		if($user->Pasword==$op){
          	
      $user->Pasword=$p;
     if($user->save()){
		 echo 1;
	 }else{
		 echo $user->getErrors();
	 }  
     				
		}else{
			echo  0;
		}
		die;
	}
	
	public function actionUserUpdate($id){
		///echo "<pre>";print_r($_POST);die;
		$user=Users::model()->findByPk($id);
		$user->FirstName=$_POST['firstname'];
		$user->LastName=$_POST['lastname'];
		$user->Email=$_POST['email'];
		$user->EB=isset($_POST['Users']['EB'])?'1':'0';
		$user->EC=isset($_POST['Users']['EC'])?'1':'0';
		$user->EE=isset($_POST['Users']['EE'])?'1':'0';
		if($user->save()){
			echo 1;
		}else{
			echo $user->getErrors();
		}die;
	}
}
