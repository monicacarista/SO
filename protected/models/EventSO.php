<?php

/**
 * This is the model class for table "tbl_event_so".
 *
 * The followings are the available columns in table 'tbl_event_so':
 * @property integer $id_so
 * @property integer $id_apotek
 * @property string $tgl_mulai
 * @property string $tgl_berakhir
 * @property integer $total_selisih_item
 */
class EventSO extends CActiveRecord
{
	public $selisih_stok;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_event_so';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_apotek, tgl_mulai, tgl_berakhir', 'required'),
			array('id_apotek, total_selisih_item', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_so, id_apotek, tgl_mulai, tgl_berakhir, total_selisih_item', 'safe', 'on'=>'search'),
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
			//'item'=>array(self::HAS_MANY, 'Post', 'id_item'),
		);
	}
	public function getTes(){
		$sql1='SELECT *, jml_stok_tem - jml_stok, (jml_stok_tem - jml_stok)*harga as selisih_harga
		FROM
		(
		SELECT i.id_item, i.nama_item, SUM(stok) AS jml_stok, harga FROM tbl_dtl_item d
		LEFT JOIN tbl_item i ON i.id_item = d.id_item 
		GROUP BY id_item) AS xxx
		LEFT JOIN
		(
		SELECT i.id_item, i.nama_item, id_so, SUM(stok_tempat) AS jml_stok_tem FROM tbl_pencatatan p
		LEFT JOIN tbl_item i ON i.id_item = p.id_item
		GROUP BY i.id_item) AS yyy 
		ON xxx.id_item = yyy.id_item ';
		$dataProvider1=new CSqlDataProvider($sql1, array(
			'keyField'=>'id_item',
			'pagination'=>array(
				'pageSize'=>20,
			),
		));
		return $dataProvider1;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_so' => 'Id So',
			'id_apotek' => 'Nama Apotek',
			'tgl_mulai' => 'Tgl Mulai',
			'tgl_berakhir' => 'Tgl Berakhir',
			'total_selisih_item' => 'Total Selisih Item',
			
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

		$criteria->compare('id_so',$this->id_so);
		$criteria->compare('id_apotek',$this->id_apotek);
		$criteria->compare('tgl_mulai',$this->tgl_mulai,true);
		$criteria->compare('tgl_berakhir',$this->tgl_berakhir,true);
		$criteria->compare('total_selisih_item',$this->total_selisih_item);
		// $criteria->select=(" (stok-stok_tempat) as selisih_stok ");
		// $criteria->join=(" join tbl_pencatatan p JOIN tbl_dtl_item di ");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function search2()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_so',$this->id_so);
		 $criteria->select=("p.id_item as id_item ");
		 $criteria->join=(" join tbl_pencatatan p ");
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getS()
{
	$sql1='SELECT count(id_so), id_so FROM tbl_event_so GROUP BY id_so';
	$dataProvider1 = new CSqlDataProvider($sql1, array(
		'keyField'=>'id_so',
		'pagination'=>array(
			'pageSize'=>5,
		),
	));
	return $dataProvider1;
}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventSO the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
