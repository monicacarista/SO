<?php

/**
 * This is the model class for table "tbl_event_so".
 *
 * The followings are the available columns in table 'tbl_event_so':
 * @property integer $id_so
 * @property integer $id_apotek
 * @property integer $id_apoteker
 * @property string $tgl_mulai
 * @property string $tgl_berakhir
 * @property string $periodeSO
 * @property integer $total_selisih_item
 */
class EventSO extends CActiveRecord
{
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
			array('id_apoteker, tgl_mulai, tgl_berakhir', 'required'),
			array('id_apotek, id_apoteker, total_selisih_item', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_so, id_apotek, id_apoteker, tgl_mulai, tgl_berakhir, periodeSO, total_selisih_item', 'safe', 'on'=>'search'),
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
			'id_so' => 'Id So',
			'id_apotek' => 'Id Apotek',
			'id_apoteker' => 'Id Apoteker',
			'tgl_mulai' => 'Tgl Mulai',
			'tgl_berakhir' => 'Tgl Berakhir',
			'periodeSO' => 'Periode So',
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
		$criteria->compare('id_apoteker',$this->id_apoteker);
		$criteria->compare('tgl_mulai',$this->tgl_mulai,true);
		$criteria->compare('tgl_berakhir',$this->tgl_berakhir,true);
		$criteria->compare('periodeSO',$this->periodeSO,true);
		$criteria->compare('total_selisih_item',$this->total_selisih_item);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getTes(){
		$sql1='SELECT *, (jml_stok_tem - jml_stok)as ttl_selisih_item, (jml_stok_tem - jml_stok)*harga as selisih_harga
		FROM
		(
		SELECT i.id_item, i.nama_item, satuan, SUM(stok) AS jml_stok, harga FROM tbl_dtl_item d
		LEFT JOIN tbl_item i ON i.id_item = d.id_item 
		GROUP BY id_item) AS xxx
		LEFT JOIN
		(
		SELECT i.id_item, i.nama_item, id_so, SUM(stok_tempat) AS jml_stok_tem FROM tbl_pencatatan p
		LEFT JOIN tbl_item i ON i.id_item = p.id_item
		GROUP BY i.id_item) AS yyy 
		ON xxx.id_item = yyy.id_item
		
		';
		$dataProvider1=new CSqlDataProvider($sql1, array(
			'keyField'=>'id_so',
			'pagination'=>array(
				'pageSize'=>25,
			),
		));
		return $dataProvider1;
	}

	public function reportSe()
	{
		
		$criteria=new CDbCriteria;
	
		$criteria->select='t.id_so, xxx.id_pencatatan, xxx.stok_tempat';
		$criteria->join=" JOIN tbl_pencatatan as xxx ON (t.id_so=xxx.id_so)";
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	
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
