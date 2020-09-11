<?php

class EventSOController extends Controller
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
				'actions'=>array('admin','delete','report','export','tampil','exportExcel','report1'),
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
		$model=new EventSO;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EventSO']))
		{
			$model->attributes=$_POST['EventSO'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_so));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	

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
	public function actionReport()
	{
		$dataProvider1=EventSO::model()->getTes();
		$this->render('report', array(
			'dataProvider1'=>$dataProvider1,
		));
	}
	
	

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EventSO');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

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

	public function actionCreatepdf(){
	
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		spl_autoload_register(array('YiiBase','autoload'));
		                
		// set document information
		$pdf->SetCreator(PDF_CREATOR);  
		                
		$pdf->SetTitle("Stock Opname Report -2020");                
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Selling Report -2013", "selling report for Jun- 2013");
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetFont('helvetica', '', 8);
		$pdf->SetTextColor(80,80,80);
		$pdf->AddPage();
		                 
		//Write the html
		$html = "<div style='margin-bottom:15px;'>This is testing HTML.</div>";
		//Convert the Html to a pdf document
		$pdf->writeHTML($html, true, false, true, false, '');
		
		$header = array('ID SO', 'ID item', 'Nama Item', 'Jumlah Stok','Jumlah Stok Tempat','Harga Per Item','Selisih Total Item','Selisih Total Harga'); //TODO:you can change this Header information according to your need.Also create a Dynamic Header.

		// data loading
		$data = $pdf->LoadData(Yii::getPathOfAlias('ext.tcpdf').DIRECTORY_SEPARATOR.'table_data_demo.txt'); //This is the example to load a data from text file. You can change here code to generate a Data Set from your model active Records. Any how we need a Data set Array here.
		// print colored table
		$pdf->ColoredTable($header, $data);
		// reset pointer to the last page
		$pdf->lastPage();
		
		//Close and output PDF document
		$pdf->Output('filename.pdf', 'I');
		Yii::app()->end();
		
	}

	public function actionReport1()
	{
		$model=new EventSO('getTes');
		
		$this->render('report1', array(
			'model'=>$model,
		));
	}


	public function actionExportExcel(){
		$model = new EventSO();
		$this->widget('ext.EExcelView', array(
			'grid_mode'=>'export',
			'title' => 'Daftar SO',
		'dataProvider' =>$model->getTes(),
	//	'filter' => $model,
		'columns' => array(
			'id_so',
			'id_item',
			'nama_item',
			'jlh_stok',
			'jlh_stok_tem',
			'harga',
			'selisih_total_item',
			'selisih_total_harga',
		),
	));
}

	public function getSelisih(){
			$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_event_so')->queryScalar();
			$sql='SELECT  p.id_item 
			FROM tbl_pencatatan p';
			 $rawData = Yii::app()->db->createCommand($sql);
			$model=new CSqlDataProvider($rawData, array(
				'totalItemCount'=>$count,
				'keyField' => 'id_so', 
				'sort'=>array(
					'attributes'=>array(
						'id_item','is_so'
						 
											  
					),
				),
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
			$this->render('reportselisih', array(
				'model' => $model,
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
