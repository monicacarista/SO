<?php

/**
 * This is the model class for table "tbl_apoteker".
 *
 * The followings are the available columns in table 'tbl_apoteker':
 * @property integer $id_apoteker
 * @property string $nama_apoteker
 * @property string $alamat_apoteker
 * @property integer $no_telp_apoteker
 */
class Apoteker extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_apoteker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_apoteker, alamat_apoteker, no_telp_apoteker', 'required'),
			array('no_telp_apoteker', 'numerical', 'integerOnly'=>true),
			array('nama_apoteker, alamat_apoteker', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_apoteker, nama_apoteker, alamat_apoteker, no_telp_apoteker', 'safe', 'on'=>'search'),
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
			'id_apoteker' => 'Id Apoteker',
			'nama_apoteker' => 'Nama Apoteker',
			'alamat_apoteker' => 'Alamat Apoteker',
			'no_telp_apoteker' => 'No Telp Apoteker',
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

		$criteria->compare('id_apoteker',$this->id_apoteker);
		$criteria->compare('nama_apoteker',$this->nama_apoteker,true);
		$criteria->compare('alamat_apoteker',$this->alamat_apoteker,true);
		$criteria->compare('no_telp_apoteker',$this->no_telp_apoteker);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Apoteker the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
