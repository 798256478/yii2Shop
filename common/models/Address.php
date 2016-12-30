<?php
namespace common\models;
use yii\db\ActiveRecord;

/**
* 地址
*/
class Address extends ActiveRecord
{
	
	public static function tableName()
	{
		return "address";
	}

	public function attributeLabels()
	{
		return [
			'name' => "姓名",
			'telephone' => "电话号码",
			'address' => "地址",
			'postcode' => "邮编",
		];
	}

	public function rules()
	{
		return [
			[['name', 'telephone', 'address', 'postcode'], 'required'],
		];
	}

}

?>