<?php

/**
 * This is the model class for table "tbl_item".
 *
 * The followings are the available columns in table 'tbl_item':
 * @property integer $id_item
 * @property string $kode_item
 * @property string $nama_item
 * @property string $satuan
 * @property string $lokasi_rak
 * @property string $item_barcode
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
			array('kode_item, nama_item, satuan, lokasi_rak', 'required'),
			array('kode_item', 'length', 'max'=>6),
			array('nama_item, lokasi_rak, item_barcode', 'length', 'max'=>150),
			array('satuan', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_item, kode_item, nama_item, satuan, lokasi_rak, item_barcode', 'safe', 'on'=>'search'),
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
			'kode_item' => 'Kode Item',
			'nama_item' => 'Nama Item',
			'satuan' => 'Satuan',
			'lokasi_rak' => 'Lokasi Rak',
			'item_barcode' => 'Item Barcode',
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
		$criteria->compare('kode_item',$this->kode_item,true);
		$criteria->compare('nama_item',$this->nama_item,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('lokasi_rak',$this->lokasi_rak,true);
		$criteria->compare('item_barcode',$this->item_barcode,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getItemBarcode($valueArray) {
        $elementId = $valueArray['kode_item'] . "_bcode"; /*the div element id*/
        $value = $valueArray['barocde'];
        $type = 'code128'; /* you can set the type dynamically if you want valueArray eg - $valueArray['type']*/
        self::getBarcode(array('elementId' => $elementId, 'value' => $value, 'type' => $type)); 
 		return CHtml::tag('div', array('id' => $elementId));
	}
	public static function getIdBarcode($valueArray) {
        $elementId = $valueArray['id_item'] . "_bcode"; /*the div element id*/
        $value = $valueArray['barocde'];
        $type = 'code128'; /* you can set the type dynamically if you want valueArray eg - $valueArray['type']*/
        self::getBarcode(array('elementId' => $elementId, 'value' => $value, 'type' => $type)); 
 		return CHtml::tag('div', array('id' => $elementId));
	}
	public static function getBarcode($optionsArray) {
 
        Yii::app()->getController()->widget('ext.Yii-Barcode-Generator.Barcode', $optionsArray);
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
