<?php
namespace common\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
	public static function tableName()
	{
		return "Product";
	}

	public function rules()
	{

	}

	public function addproduct($post)
	{
		$this->scenario = "addproduct";
	}

}
?>