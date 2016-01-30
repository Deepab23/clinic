<?php

class SessionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';



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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Session;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Session']))
		{
			$model->attributes=$_POST['Session'];
			if($model->save()){
				
					$cid=$model->id;
				foreach($_FILES['afiles']['tmp_name'] as $key => $tmp_name ){
               $afilesdesc=$_POST['afilesdesc'][$key];
				$file_name = $_FILES['afiles']['name'][$key];
				$file_tmp =$_FILES['afiles']['tmp_name'][$key];
				if(!empty($file_name)){
					
				$nx=explode(".",$file_name);
					$pname=$nx[0].rand(1000,999999999).".".pathinfo($file_name, PATHINFO_EXTENSION);
				$file=Yii::app()->basePath.'/../uploads/images/'.$pname;
				move_uploaded_file($file_tmp,$file);
				
				$ca=new SessionNotes;
				$ca->session_id=$cid;
				$ca->url=$pname;
				$ca->description=$afilesdesc;
				$ca->save();
				
			
				
				}
				

				}
				if(isset($_POST['comments'])){
					foreach($_POST['comments'] as $cmt){
						$mcm= new SessionComment;
						$mcm->comment=$cmt;
						$mcm->users_id=Yii::app()->user->id;
						$mcm->session_id=$cid;
						
						$mcm->save();
						
					}
				}
				
					if(isset($_POST['thrapist'])){
						
						foreach($_POST['thrapist'] as $kx=>$thid){
				$sth= new SessionTherapist;
				$sth->therapist_id=$thid;
				$sth->total_time=$_POST['thrapisttime'][$kx];
				$sth->session_id=$cid;
				$sth->save();
						}
					}
				
          $this->redirect(array('index'));
			}
				
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Session']))
		{
			$model->attributes=$_POST['Session'];
			if($model->save())
			{
					$cid=$model->id;
				foreach($_FILES['afiles']['tmp_name'] as $key => $tmp_name ){
               $afilesdesc=$_POST['afilesdesc'][$key];
				$file_name = $_FILES['afiles']['name'][$key];
				$file_tmp =$_FILES['afiles']['tmp_name'][$key];
				if(!empty($file_name)){
					$nx=explode(".",$file_name);
					$pname=$nx[0].rand(1000,999999999).".".pathinfo($file_name, PATHINFO_EXTENSION);
				$file=Yii::app()->basePath.'/../uploads/images/'.$pname;
				move_uploaded_file($file_tmp,$file);
				
				$ca=new SessionNotes;
				$ca->session_id=$cid;
				$ca->url=$pname;
				$ca->description=$afilesdesc;
				$ca->save();
				}
				
				
				if(isset($_POST['comments'])){
					foreach($_POST['comments'] as $cmt){
						$mcm= new SessionComment;
						$mcm->comment=$cmt;
						$mcm->users_id=Yii::app()->user->id;
						$mcm->session_id=$cid;
						
						$mcm->save();
						
					}
				}
				
					if(isset($_POST['thrapist'])){
						
						foreach($_POST['thrapist'] as $kx=>$thid){
				$sth= new SessionTherapist;
				$sth->therapist_id=$thid;
				$sth->total_time=$_POST['thrapisttime'][$kx];
				$sth->session_id=$cid;
				$sth->save();
						}
					}
					
			
				
				
				

				}
				
          $this->redirect(array('index'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
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
		$model=new Session('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Session']))
			$model->attributes=$_GET['Session'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Session('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Session']))
			$model->attributes=$_GET['Session'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	
	
		public function actionTherapist($id)
	{
		$model=new Session('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Session']))
			$model->attributes=$_GET['Session'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Session the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Session::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Session $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='session-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
		
}
