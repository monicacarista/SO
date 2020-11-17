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
 * @property integer $id_apoteker
 */
class Pencatatan extends CActiveRecord
{
	public $nama_item;
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
		//	array('id_dtl_item', 'unique'),
		//	array('id_item','checkItem'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pencatatan, id, id_so,id_jadwal, id_item, stok_tempat, id_dtl_item', 'safe', 'on'=>'search'),
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
			'tbl_item'=>array(self::HAS_MANY, 'Item', 'id_item'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pencatatan' => 'Id Pencatatan',
			'id' => 'Id Apoteker',
			'id_so' => 'Id So',
			'id_jadwal' => 'Id Jadwal',
			'id_item' => 'Id Item',
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
		$criteria->compare('id',$this->id);
		$criteria->compare('stok_tempat',$this->stok_tempat);
		$criteria->compare('id_dtl_item',$this->id_dtl_item,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public static function usersAutoComplete($name='') {

		// Recommended: Secure Way to Write SQL in Yii 
    $sql= 'SELECT id_item ,nama_item AS label FROM tbl_item WHERE nama_item LIKE :name';
		$name = $name.'%';
		return Yii::app()->db->createCommand($sql)->queryAll(true,array(':name'=>$name));

		// Not Recommended: Simple Way for those who can't understand the above way.
    // Uncomment the below and comment out above 3 lines 
    /*
    $sql= "SELECT id ,title AS label FROM users WHERE title LIKE '$name%'";
		return Yii::app()->db->createCommand($sql)->queryAll();
    */
    
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
	    -- WHERE  id_so =  :id 

		';

		$dataProvider1=new CSqlDataProvider($sql1, array(
			// 'params' => array(':id' =>Yii::app()->user->getState('id_so')),
			'keyField'=>'id_so',
			'pagination'=>array(
				'pageSize'=>25,
			),
		));
		return $dataProvider1;
	}

	public function beforeSave()

		{

			// periksa tabel dengan PK yg sama dengan yg akan ditulis

			$model = Pencatatan::findByPk(array($this->id_item, $this->id_dtl_item));

			if ($model)

				return false; // gak jadi save karena datanya sudah ada

			else

				return true; // data dengan PK yg sama belum ada, maka OK untuk save




		}


	public function getpembagian(){
		$sql1='SELECT tbl_item.*, tbl_dtl_item.*, tbl_jadwal.id_jadwal, tbl_jadwal.id_apoteker , nama_apoteker, lokasi_rak, stok_tempat
		FROM tbl_item JOIN tbl_dtl_item JOIN tbl_jadwal JOIN tbl_apoteker JOIN tbl_pencatatan
		WHERE tbl_jadwal.id_apoteker = tbl_apoteker.id_apoteker GROUP BY id_jadwal
		';

		$dataProvider3=new CSqlDataProvider($sql1, array(
		//	'params' => array(':id' =>Yii::app()->user->getState('id_jadwal')),
			'keyField'=>'id_item',
			'pagination'=>array(
				'pageSize'=>25,
			),
		));
		return $dataProvider3;
	}


	public function getBN(){
		$id_item = $_GET["id_item"];
		$sql = Yii::app()->db->createCommand()
							->select('*')
							->from('tbl_dtl_item')
							->where('id_item=:id_item',array(':id_item'=>$id_item))
							->queryRow();
		


	}

	public function getItemReport(){
		$sql2='SELECT tbl_dtl_item.id_item , i.nama_item, batch,stok,i.lokasi_rak, exp_date 
		from tbl_item i, tbl_dtl_item 
		where exp_date < curdate() group by i.nama_item;

		';

		$dataProvider2=new CSqlDataProvider($sql2, array(
			'keyField'=>'id_item',
			'pagination'=>array(
				'pageSize'=>25,
			),
		));
		return $dataProvider2;
	}


	

	public function reportSe()
	{
		$criteria=new CDbCriteria;
	
		$criteria->select='tbl.*, i.nama_item';
		$criteria->alias='tbl';
		$criteria->join=' JOIN tbl_item  i';
		
		$criteria->condition="tbl.id_so=:id";
		
		$criteria->params=array(':id'=>$this->id_so);
		$criteria->together = true; // ADDED THIS
		$criteria->limit = 10;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	
	}
	
	public function BN()
	{
		$criteria=new CDbCriteria;
	
		$criteria->select='tbl.*, i.batch';
		$criteria->alias='tbl';
		$criteria->join=' JOIN tbl_dtl_item  i';
		
		$criteria->condition="tbl.id_item=:id";
		
		$criteria->params=array(':id'=>$this->id_item);
		$criteria->together = true; // ADDED THIS
		$criteria->limit = 10;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	
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
