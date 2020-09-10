<?php

class PencatatanController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pencatatan']))
		{
			$model->attributes=$_POST['Pencatatan'];
			if($model->save())
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
	public function getIdApotek($id_apotek) {
		$model= Apotek::model()->findByPk($id_apotek);
		if($model!=null)
		{
			return $model->nama_apotek;
		}
		return "";
	}

	public function actionAutocomplete()
 {
 $res =array();

            if (isset($_GET['term'])) {
                    $qtxt ="SELECT tbl_pencatatan.id_apotek, nama_apotek from tbl_pencatatan join tbl_apotek WHERE nama_apotek  LIKE :nama_apotek
                            ORDER BY id_apotek ASC"; 
                    $command =Yii::app()->db->createCommand($qtxt);
                    $command->bindValue(":id_apotek", $_GET['term'].'%', PDO::PARAM_STR);
                    $res =$command->queryColumn();
            }

            echo CJSON::encode($res);
            Yii::app()->end();

 }

	public function getIdItem($id_item) {
		$model= Item::model()->findByPk($id_item);
		if($model!=null)
		{
			return $model->nama_item;
		}
		return "";
	}
	public function getIdSO($id_so) {
		$model= EventSO::model()->findByPk($id_so);
		if($model!=null)
		{
			return $model->id_so;
		}
		return "";
	}


	public function getBatch($id_dtl_item) {
		$model= DtlItem::model()->findByPk($id_dtl_item);
		if($model!=null)
		{
			return $model->batch;
		}
		return "";
	}

	public function actionCariId() 
{
   $res =array();
   if (isset($_GET['term'])) {
     $qtxt ="SELECT id_item as ID FROM Item WHERE nama LIKE :name ORDER BY nama LIMIT 20";
     $command =Yii::app()->db->createCommand($qtxt);
     $command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
     $res =$command->queryAll();
   }
   echo CJSON::encode($res);
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
