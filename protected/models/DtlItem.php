<?php

/**
 * This is the model class for table "tbl_dtl_item".
 *
 * The followings are the available columns in table 'tbl_dtl_item':
 * @property integer $id_dtl_item
 * @property integer $id_apotek
 * @property integer $id_item
 * @property string $batch
 * @property integer $stok
 * @property string $exp_date
 * @property integer $harga
 */
class DtlItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_dtl_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_item, batch, stok, exp_date, harga', 'required'),
			array('id_item, id_apotek,stok, harga', 'numerical', 'integerOnly'=>true),
			array('batch', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_dtl_item, id_apotek, id_item, batch, stok, exp_date, harga', 'safe', 'on'=>'search'),
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
			'id_dtl_item' => 'Id Dtl Item',
			'id_apotek' => 'Nama Apotek',
			'id_item' => 'Nama Item',
			'batch' => 'Batch Number',
			'stok' => 'Stok',
			'exp_date' => 'Exp Date',
			'harga' => 'Harga',
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

		$criteria->compare('id_dtl_item',$this->id_dtl_item);
		$criteria->compare('id_apotek',$this->id_apotek);
		$criteria->compare('id_item',$this->id_item);
		$criteria->compare('batch',$this->batch,true);
		$criteria->compare('stok',$this->stok);
		$criteria->compare('exp_date',$this->exp_date,true);
		$criteria->compare('harga',$this->harga);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DtlItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
