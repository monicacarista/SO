<?php

/**
 * This is the model class for table "tbl_dtl_jadwal".
 *
 * The followings are the available columns in table 'tbl_dtl_jadwal':
 * @property integer $id_dtl_jadwal
 * @property integer $id
 * @property integer $id_jadwal
 * @property integer $id_item
 */
class DtlJadwal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_dtl_jadwal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' id, id_jadwal, id_item', 'required'),
			array('id_dtl_jadwal, id, id_jadwal, id_item', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_dtl_jadwal, id, id_jadwal, id_item', 'safe', 'on'=>'search'),
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
			'id_dtl_jadwal' => 'Id Dtl Jadwal',
			'id' => 'ID',
			'id_jadwal' => 'Id Jadwal',
			'id_item' => 'Id Item',
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

		$criteria->compare('id_dtl_jadwal',$this->id_dtl_jadwal);
		$criteria->compare('id',$this->id);
		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('id_item',$this->id_item);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DtlJadwal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
