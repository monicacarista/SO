<?php

/**
 * This is the model class for table "tbl_jadwal".
 *
 * The followings are the available columns in table 'tbl_jadwal':
 * @property integer $id_jadwal
 * @property integer $id_apoteker
 *  @property integer $id_so
 * @property string $jadwal_pengecekan
 * @property string $id_item
 */
class Jadwal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_jadwal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_apoteker, jadwal_pengecekan', 'required'),
			array('id_apoteker', 'numerical', 'integerOnly'=>true),
			array('id_item', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_jadwal, id_so,id_apoteker, jadwal_pengecekan, id_item', 'safe', 'on'=>'search'),
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
			
				'tbl_item'=>array(self::HAS_MANY, 'Item', 'id_item'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_jadwal' => 'Id Jadwal',
			'id_apoteker' => 'Id Staff',
			'id_so' => 'Id SO',
			'jadwal_pengecekan' => 'Jadwal Pengecekan',
			'id_item' => 'Lokasi Rak',
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

		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('id_so',$this->id_so);
		$criteria->compare('id_apoteker',$this->id_apoteker);
		$criteria->compare('jadwal_pengecekan',$this->jadwal_pengecekan,true);
		
		$criteria->compare('id_item',$this->id_item,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jadwal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
