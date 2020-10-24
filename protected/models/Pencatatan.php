<?php

/**
 * This is the model class for table "tbl_pencatatan".
 *
 * The followings are the available columns in table 'tbl_pencatatan':
 * @property integer $id_pencatatan
 * @property integer $id_so
 * @property string $id_jadwal
 * @property integer $id_item
 * @property integer $stok_tempat
 * @property string $id_dtl_item
 */
class Pencatatan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_pencatatan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' id_item, stok_tempat, id_dtl_item', 'required'),
			array('id_so, stok_tempat', 'numerical', 'integerOnly'=>true),
			array('id_dtl_item', 'length', 'max'=>11),
		//	array('id_item','checkItem'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pencatatan, id_so, kode_item,id_jadwal, id_item, stok_tempat, id_dtl_item', 'safe', 'on'=>'search'),
		);
	}
// 	public function checkItem($attribute,$params)
// {
//    $record=Item::model()->findByAttributes(array('id_item'=>$this->attributes['id_item']));
//    if($record===null){
//       $this->addError($attribute, 'Invalid Item');
//    }
// }

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
			'id_pencatatan' => 'Id Pencatatan',
			'id_so' => 'Id So',
			'id_jadwal' => 'Id Jadwal',
			'id_item' => 'Id Item',
			'kode_item' => 'Kode Item',
			'stok_tempat' => 'Stok Tempat',
			'id_dtl_item' => 'Id Dtl Item',
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

		$criteria->compare('id_pencatatan',$this->id_pencatatan);
		$criteria->compare('id_so',$this->id_so);
		$criteria->compare('id_jadwal',$this->id_jadwal,true);
		$criteria->compare('id_item',$this->id_item);
		$criteria->compare('kode_item',$this->kode_item);
		$criteria->compare('stok_tempat',$this->stok_tempat);
		$criteria->compare('id_dtl_item',$this->id_dtl_item,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchPeriode(){
		//$data=array();
		$sm = 'select monthname(tgl_mulai), year(tgl_mulai) from tbl_event_so';
		$dataProvider3=new CSqlDataProvider($sm, array(
			'keyField'=>'id_so',
			'pagination'=>array(
				'pageSize'=>25,
			),
		));
		return $dataProvider3;
	}
	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pencatatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
