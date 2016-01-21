<?php

class QuestionsController extends Controller
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
			'pid'=>$id,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		
		
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(!empty($_POST['projid']))
		{
			
			
		//$this->mailsend("11supperuser@gmail.com","Hi","Test");
			
			foreach($_FILES as $k=>$p){
				
				$model=new Answers;
				$vals= explode("_",$k);
				
				if(!empty($p)){
				$connection = Yii::app()->db;
				$command=$connection->createCommand("DELETE FROM answers where questionid='$vals[1]' and sectionid='$vals[2]' and  projectid='$vals[3]'");
				$command->execute();
				$mostview=$command->query();
                $pnames="";
				foreach($p['name'] as $nk=>$nm){
				$pname=md5(rand(1000,9999999)).time().".".pathinfo($nm, PATHINFO_EXTENSION);
				$pnames=$pnames.",".$pname;
				
				$file=Yii::app()->basePath.'/../uploads/images/'.$pname;
				move_uploaded_file($p['tmp_name'][$nk],$file);
					
				}
				
				$pnames=ltrim($pnames);
				$model->questionid=$vals[1];
				$model->sectionid=$vals[2];
				$model->projectid=$vals[3];
				$model->Answer=$pnames;
				$model->userid=Yii::app()->user->id;;
				$model->save();
			}
			}
			foreach($_POST as $k=>$p){
				if(!empty($p)){
					
				
				$model=new Answers;
				if(is_array($p)){
					$p=implode(",",$p);
				}
				$vals= explode("_",$k);
				
				$connection = Yii::app()->db;
				$command=$connection->createCommand("DELETE FROM answers where questionid='$vals[1]' and sectionid='$vals[2]' and  projectid='$vals[3]'");
				$command->execute();
				$mostview=$command->query();
				
				$model->questionid=$vals[1];
				$model->sectionid=$vals[2];
				$model->projectid=$vals[3];
				$model->Answer=$p;
				$model->userid= Yii::app()->user->id;
				$model->save();
				}
			}
			if($_POST['projid']==0){
				
				
				ob_start();


				$datax=$this->renderPartial('eview',array(
			'pid'=>$vals[3]),true
		);
		
		    ob_end_clean();
	
		
				$this->mailsend("11supperuser@gmail.com","Hi",$datax);
				$this->redirect(array('project/index'));
			}else{
			 $this->render('create',array(
			'pid'=>$_POST['projid'],
		));
			}
		}else{
			
			$this->render('create',array(
			'pid'=>$id,
		));
		
		}

		
	}
	


	
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
		$dataProvider=new CActiveDataProvider('Questions');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Questions('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Questions']))
			$model->attributes=$_GET['Questions'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Questions the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Questions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Questions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='questions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
