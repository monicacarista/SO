<?php

class ItemController extends Controller
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
				'actions'=>array('index','view','report'),
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
		$model=new Item;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Item']))
		{
			$model->attributes=$_POST['Item'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_item));
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

		if(isset($_POST['Item']))
		{
			$model->attributes=$_POST['Item'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_item));
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
		//  # mPDF
		//  $mPDF1 = Yii::app()->ePdf->mpdf();

		//  # You can easily override default constructor's params
		//  $mPDF1 = Yii::app()->ePdf->mpdf('', 'A5');
 
		//  # render (full page)
		//  $mPDF1->WriteHTML($this->render('index', array(), true));
 
		//  # Load a stylesheet
		//  $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
		//  $mPDF1->WriteHTML($stylesheet, 1);
 
		//  # renderPartial (only 'view' of current controller)
		//  $mPDF1->WriteHTML($this->renderPartial('index', array(), true));
 
		//  # Renders image
		//  $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
 
		//  # Outputs ready PDF
		//  $mPDF1->Output();
 
		//  ////////////////////////////////////////////////////////////////////////////////////
 
		//  # HTML2PDF has very similar syntax
		//  $html2pdf = Yii::app()->ePdf->HTML2PDF();
		//  $html2pdf->WriteHTML($this->renderPartial('index', array(), true));
		//  $html2pdf->Output();
 
		//  ////////////////////////////////////////////////////////////////////////////////////
 
		//  # Example from HTML2PDF wiki: Send PDF by email
		//  $content_PDF = $html2pdf->Output('', EYiiPdf::OUTPUT_TO_STRING);
		//  require_once(dirname(__FILE__).'/pjmail/pjmail.class.php');
		//  $mail = new PJmail();
		//  $mail->setAllFrom('webmaster@my_site.net', "My personal site");
		//  $mail->addrecipient('mail_user@my_site.net');
		//  $mail->addsubject("Example sending PDF");
		//  $mail->text = "This is an example of sending a PDF file";
		//  $mail->addbinattachement("my_document.pdf", $content_PDF);
		//  $res = $mail->sendmail();

		// if (!Yii::app()->user->isGuest){

		// 	$dataReportItem=Item::model()->getMyreport();
		// 	if(isset($_REQUEST['ExcelReport'])){
		// 			$from=$_REQUEST['from'];
		// 			$until=$_REQUEST['until'];
		// 		   Yii::app()->request->sendFile('items_periode_'.$from.'-'.$until.'.xls',
		// 		   $this->renderPartial('view_item_report',array(
		// 'dataReportItem' =>$dataReportItem,
		// 		   )),true);                
		// 	}

		// 	if(isset($_REQUEST['PdfReport'])){
		// 			$from=$_REQUEST['from'];
		// 			$until=$_REQUEST['until'];
		// 			$mPDF1 = Yii::app()->ePdf->mpdf();
		// 			$mPDF1->WriteHTML($this->renderPartial('view_item_report',array(
		// 'dataReportKas'=>$dataReportKas,
		// 			), true));
		// 			$mPDF1->Output('items_periode_'.$from.'-'.$until,"I");
			
		// 	}
		
		
		$dataProvider=new CActiveDataProvider('Item');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	
 }
	 public function actionReport()
	 {
		
		$model = new Item;

		 $dataProvider=new CActiveDataProvider('Item');
		$this->render('report',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function tes(){
			$count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM tbl_item')->queryScalar();
			$sql='SELECT nama_item FROM tbl_item';
			$rawData = Yii::app()->db->createCommand($sql);
			$model=new CSqlDataProvider($rawData, array(
				'keyField'=>'id_item',
				'totalItemCount' => $count,
				'sort'=>array(
					'attributes'=>array(
						 'nama_item', 
					),
				),
				'pagination'=>array(
					'pageSize'=>10,
				),
			));
			$this->render('report', array(
				'model' => $model,
			));
		 }
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Item('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Item']))
			$model->attributes=$_GET['Item'];

	
					$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionCreatepdf(){
	
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		spl_autoload_register(array('YiiBase','autoload'));
		                
		// set document information
		$pdf->SetCreator(PDF_CREATOR);  
		                
		$pdf->SetTitle("Selling Report -2013");                
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
		
		$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)'); //TODO:you can change this Header information according to your need.Also create a Dynamic Header.

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


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Item the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Item::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Item $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='item-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
