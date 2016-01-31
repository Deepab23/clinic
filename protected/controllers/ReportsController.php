<?php

class ReportsController extends Controller
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
		$connection = Yii::app()->db;
		$reports=array();
		if(!empty($_POST)){
			$where='WHERE';
			if(isset($_POST['thrapist']) && !empty($_POST['thrapist'])){
				$thrapist=$_POST['thrapist'];
				 $where.=" st.therapist_id IN(".implode(',',$thrapist).")";
				
			}
			if(isset($_POST['Client']) && !empty($_POST['Client'])){
				if(!empty($_POST['thrapist'])){
				$where.=" AND";
				}
				$client=$_POST['Client'];
				$where.=" c.id IN(".implode(',',$client).")";
				
				
			}
			if(isset($_POST['Start']) && !empty($_POST['Start']) && isset($_POST['end']) && !empty($_POST['end'])){
				if(!empty($_POST['thrapist']) || !empty($_POST['Client'])){
				$where.=" AND";		
				}
				$Start=date("Y-m-d",strtotime($_POST['Start']));
				$end=date("Y-m-d",strtotime($_POST['end']));
				 $where.=" s.date>='".$Start."' AND s.date<='".$end."'";
				
			}
			
			$sql="Select s.*,c.FirstName,c.LastName,st.total_time,u.FirstName as thFirstName,u.LastName as thLastName from session as s INNER JOIN clients as c ON c.id=s.client_id INNER JOIN session_therapist as st ON st.session_id=s.id INNER JOIN users as u ON u.id=st.therapist_id $where";
			//echo $sql;die;
			$command = $connection->createCommand($sql);
			$reports= $command->queryAll();
			$reports[0]['cid']=@$_POST['Client'];
			$reports[0]['tid']=@$_POST['thrapist'];
			$reports[0]['start']=@$_POST['Start'];
			$reports[0]['end']=@$_POST['end'];				
			
		}
		 //executes the SQL
		$this->render('admin',array(
			'model'=>$reports,
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
	
	
		public  function actionPdf()
	{
		
		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');
 
        # render (full page)
        $mPDF1->WriteHTML('<h1> Repost  </h1>');
 
    
        # Outputs ready PDF
        $mPDF1->Output();
		
	}
	
		
}
