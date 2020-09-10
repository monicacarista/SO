<?php

/**
 * This is the model class for table "tbl_item".
 *
 * The followings are the available columns in table 'tbl_item':
 * @property integer $id_item
 * @property string $nama_item
 * @property string $satuan
 * @property string $lokasi_rak
 */
class Item extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('nama_item, satuan, lokasi_rak', 'required'),
            array('nama_item, lokasi_rak', 'length', 'max'=>150),
            array('satuan', 'length', 'max'=>128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_item, nama_item, satuan, lokasi_rak', 'safe', 'on'=>'search'),
        );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_item' => 'Id Item',
			'nama_item' => 'Nama Item',
			'satuan' => 'Satuan',
			'lokasi_rak' => 'Lokasi Rak',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_item',$this->id_item);
		
		$criteria->compare('nama_item',$this->nama_item,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('lokasi_rak',$this->lokasi_rak,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getMyreport()
        {
            $from=$_REQUEST['from'];
            $until=$_REQUEST['until']; 
		$sql="SELECT * FROM tbl_item where CREATED_DATE >= '$from' and CREATED_DATE <= '$until' order by id_item desc "; // your sql here
		$dataReportItem=new CSqlDataProvider($sql,array(
			'keyField' => 'id_item',
			'pagination'=>array(
				'pageSize'=>10,
			),
		));	
		return $dataReportItem;
		}
		
		public static function exportPdf()
		{
			$pdf = Yii::createComponent('application.extensions.tcpdf.tcpdf',
								'P', 'c', 'A4', true, 'UTF-8');
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor("Nicola Asuni");
			$pdf->SetTitle("TCPDF Example 002");
			$pdf->SetSubject("TCPDF Tutorial");
			$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);
			//$pdf->AliasNbPages();
			$pdf->AddPage();
			$pdf->SetFont("times", "BI", 20);
			$pdf->Cell(0,10,"Example 002",1,1,'C');
			$pdf->Output("example_002.pdf", "I");
		}	
		


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Item the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
