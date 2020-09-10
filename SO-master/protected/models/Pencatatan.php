<?php

/**
 * This is the model class for table "tbl_pencatatan".
 *
 * The followings are the available columns in table 'tbl_pencatatan':
 * @property integer $id_pencatatan
 * @property integer $id_jadwal
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
			array('id_jadwal, id_so,  id_item, stok_tempat, id_dtl_item' ,'required'),
			array(' id_so, id_item, stok_tempat', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pencatatan, id_so, id_jadwal,  id_item, stok_tempat,id_dtl_item', 'safe', 'on'=>'search'),
			array('id_item','checkId'),
   array('id_item', 'default', 'setOnEmpty' => true),
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
			'id_pencatatan' => 'Id Pencatatan',
			'id_so'=>'ID SO',
			'id_jadwal' => 'Jadwal Pengecekan',
			'id_item' => 'Nama Item',
			'stok_tempat' => 'Stok Tempat',
			'id_dtl_item' => 'Batch Number',
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
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('id_item',$this->id_item);
		$criteria->compare('stok_tempat',$this->stok_tempat);
		$criteria->compare('id_dtl_item',$this->id_dtl_item,true);
			
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function checkId($attribute,$params)
{
   $record=Item::model()->findByAttributes(array('id_item'=>$this->attributes['id_item']));
   if($record===null){
      $this->addError($attribute, 'Invalid Item');
   }
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
