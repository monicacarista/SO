<?php

class EventSOController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/home';
	public $layout='//layouts/home';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			// array('allow', // allow authenticated user to perform 'create' and 'update' actions
			// 	'actions'=>array('create','update','index','view'),
			// 	'users'=>array('@'),
			// ),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','delete','report1','report','PDF','tes','PDF2','getPDF2','export','tampil','reportSelisih','perso'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('index'),
			'roles'=>array('staff'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
			'actions'=>array('index','view'),
			'roles'=>array('apoteker'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

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
		$model=new EventSO;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['EventSO']))
		{
			
			$model->attributes=$_POST['EventSO'];
			if($model->save())
			//Yii::app()->user->setState('id_so', $model->id_so);
				$this->redirect(array('index','id'=>$model->id_so));
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

		if(isset($_POST['EventSO']))
		{
			$model->attributes=$_POST['EventSO'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_so));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EventSO');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EventSO('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['EventSO']))
			$model->attributes=$_GET['EventSO'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EventSO the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EventSO::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	

	public function actionTes()
	{
		$dataProvider1=EventSO::model()->getTes();
		
		$model->id_so=Yii::app()->user->getState('id_so');
		$this->render('report', array(
			'dataProvider1'=>$dataProvider1,
		//	'dataProvider2'=>$dataProvider2,

		));

	}
	
	public function actionPDF2()
	{
	require_once 'C:\xampp\htdocs\SO\vendor\autoload.php' ;
	$mPDF1 = new \Mpdf\Mpdf();
	$nama='Report Stock Opname';
	$dataProvider1=EventSO::model()->getTes();
	// 	 ///////
	// 	// // //Write some HTML code:
	$mPDF1->WriteHTML($this->renderPartial('PDF',array(
		'dataProvider1' => $dataProvider1), true));

	$mPDF1->Output($nama,'I');

	}

	public function getIdItem($id_item) {
		$model= Item::model()->findByPk($id_item);
		if($model!=null)
		{
			return $model->nama_item;
		}
		return "";
	}

	public function getIdApotek($id_apotek) {
		$model= Apotek::model()->findByPk($id_apotek);
		if($model!=null)
		{
			return $model->nama_apotek;
		}
		return "";
	}

	public function getIdApoteker($id_apoteker) {
		$model= Apoteker::model()->findByPk($id_apoteker);
		if($model!=null)
		{
			return $model->nama_apoteker;
		}
		return "";
	}


	public function actionReport1()
	{
		$model=new EventSO('getTes');
		
		$this->render('report1', array(
			'model'=>$model,
		));
	}

	/**
	 * Performs the AJAX validation.
	 * @param EventSO $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='event-so-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
