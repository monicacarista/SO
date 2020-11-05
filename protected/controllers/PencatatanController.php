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
		//	'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','admin','view','create','update','pilihID','caribatch','Autocomplete','cariitem','carikode','usersAutoComplete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','perso','report1','delete','report','PDF2','PDF','reportItem'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCariitem() 
{
   $res =array();
   if (isset($_GET['term'])) {
     $qtxt ="SELECT nama_item as label, id_item, kode_item FROM tbl_item WHERE LCASE(nama_item) LIKE :name ";
     $command =Yii::app()->db->createCommand($qtxt);
	 $command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
	 
     $res =$command->queryAll();
   }
   echo CJSON::encode($res);
}

public function actionCaribatch() 
{
   $res =array();
   if (isset($_GET['term'])) {
     $qtxt ="SELECT batch as label, id_dtl_item FROM tbl_dtl_item WHERE batch LIKE :name ";
     $command =Yii::app()->db->createCommand($qtxt);
	 $command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
	 
     $res =$command->queryAll();
   }
   echo CJSON::encode($res);
}

public function actionCarikode() 
{
	$res =array();
	if (isset($_GET['term'])) {
	  $qtxt ="SELECT kode_item as label, id_item, nama_item FROM tbl_item WHERE kode_item LIKE :name ";
	  $command =Yii::app()->db->createCommand($qtxt);
	  $command->bindValue(":name", '%'.$_GET['term'].'%', PDO::PARAM_STR);
	  
	  $res =$command->queryAll();
	}
	echo CJSON::encode($res);
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
			$model->id_so=Yii::app()->user->getState('id_so');
		//	$id=Yii::app()->user->getState('id_so'); //it is better to check it via has state, and also passing a default value 
			if($model->save())
			
				$this->redirect(array('view','id'=>$model->id_pencatatan));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionAutocomplete(){
		$res = array();
		$term = Yii::app()->getRequest()->getParam('term', false);
		if ($term)
		{
		   // test table is for the sake of this example
		   $sql = 'SELECT id_item, nama_item FROM tbl_item where LCASE(name) LIKE :name';
		   $cmd = Yii::app()->db->createCommand($sql);
		   $cmd->bindValue(":name","%".strtolower($term)."%", PDO::PARAM_STR);
		   $res = $cmd->queryAll();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
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
	public function actionAdmin($id)
	{
		$model=new Pencatatan('search');
		Yii::app()->user->setState('id_so',$id);
		$model->unsetAttributes();  // clear any default values
		$model->id_so=$id;
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
	public function actionUsersAutocomplete() {
		$term = trim($_GET['term']) ;

		if($term !='') {
			// Note: Users::usersAutoComplete is the function you created in Step 2
      $users =  Item::usersAutoComplete($term);
			echo CJSON::encode($users);
			Yii::app()->end();
    }
  }

  public function actionPDF2()
	{
	require_once 'C:\xampp\htdocs\SO\vendor\autoload.php' ;
	$mPDF1 = new \Mpdf\Mpdf();
	$nama='Report Stock Opname';
	$dataProvider1=Pencatatan::model()->getTes();
	// 	 ///////
	// 	// // //Write some HTML code:
	$mPDF1->WriteHTML($this->renderPartial('report',array(
		'dataProvider1' => $dataProvider1), true));

	$mPDF1->Output($nama,'I');
	}

	public function actionReport($id)
	{
		$model=new Pencatatan();
		Yii::app()->user->setState('id_so',$id);

		$model->id_so=$id;
		
		$dataProvider1=Pencatatan::model()->getTes();
		$this->render('report', array(
			'dataProvider1'=>$dataProvider1,

		));
	}

	public function actionReportItem()
	{
		$model=new Pencatatan();
	
		
		$dataProvider2=Pencatatan::model()->getItemReport();
		$this->render('reportItem', array(
			'dataProvider2'=>$dataProvider2,

		));
	}
	
	public function actionReport1()
	{
		$model=new Pencatatan('getTes');
		
		$this->render('report1', array(
			'model'=>$model,
		));
	}

	public function actionPerso($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$model=new Pencatatan;
		Yii::app()->user->setState('id_so',$id);
		$model->unsetAttributes();  // clear any default values
		$model->id_so=$id;
		if(isset($_GET['Pencatatan']))
			$model->attributes=$_GET['Pencatatan'];

		
		$this->render('perso', array(
			'model'=>$model,
		));
		
		
	}



	public function actionPilihID(){
		$id_item = $_GET["id_item"];
		$nama = Yii::app()->db->createCommand()
							->select('*')
							->from('tbl_item')
							->where('id_item=:id_item',array(':id_item'=>$id_item))
							->queryRow();
		
		echo CJSON::encode(array(
			'error'=>'false',
			'nama_item'=>$nama["nama_item"],
			'id_item'=>$nama["id_item"],
			'kode_item'=>$nama["kode_item"],
			
		
		));
		Yii::app()->end();
	}

	public function actionAutoCompleteAjax()
	{
		$request=trim($_GET['term']);
		if($request!=''){
			$model=Item::model()->findAll(array("condition"=>"nama_item like '$request%'"));
			$data=array();
			foreach($model as $get){
				$data[]=$get->nama_item;
			}
		}
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
