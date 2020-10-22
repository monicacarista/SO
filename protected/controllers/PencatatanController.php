<?php

class PencatatanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/home';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','pilihID','createManual'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new Pencatatan;

		// Uncomment the following line if AJAX validation is needed
	 //$this->performAjaxValidation($model);

		if(isset($_POST['Pencatatan']))
		{
			$model->attributes=$_POST['Pencatatan'];
			$id=Yii::app()->user->getState('id_so'); //it is better to check it via has state, and also passing a default value 
			if($model->save())
			// Yii::app()->session['id_so'] = 'id_so';
			// echo Yii::app()->session['id_so']; // Prints "value"
			 
				$this->redirect(array('view','id'=>$model->id_pencatatan));
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

		if(isset($_POST['Pencatatan']))
		{
			$model->attributes=$_POST['Pencatatan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_pencatatan));
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
		$dataProvider=new CActiveDataProvider('Pencatatan');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pencatatan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pencatatan']))
			$model->attributes=$_GET['Pencatatan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pencatatan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pencatatan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function getBatch($id_dtl_item) {
		$model= DtlItem::model()->findByPk($id_dtl_item);
		if($model!=null)
		{
			return $model->batch;
		}
		return "";
	}

	public function getItem($id_item) {
		$model= Item::model()->findByPk($id_item);
		if($model!=null)
		{
			return $model->nama_item;
		}
		return "";
	}

	public function actionPilihID(){
		$kode_item = $_GET["id_item"];
		$nama = Yii::app()->db->createCommand()
							->select('*')
							->from('tbl_item')
							->where('kode_item=:kode_item',array(':kode_item'=>$kode_item))
							->queryRow();
		
		echo CJSON::encode(array(
			'error'=>'false',
			'nama_item'=>$nama["nama_item"],
			'id_item'=>$nama["id_item"],
		));
		Yii::app()->end();
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pencatatan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pencatatan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
