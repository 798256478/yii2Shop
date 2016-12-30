<?php
namespace common\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
	public static function tableName()
	{
		return 'cart';
	}

	public function add($data)
	{
		$product = self::find()->where('userid = :uid and productid = :pid', [':uid' => 1, 'pid' => $data['productid']])->one();
		if($product){
			$num = $product->productnum + $data['num'];
			return (bool)self::updateAll(['productnum' => $num], 'userid = :uid and productid = :pid', [':uid' => 1, 'pid' => $data['productid']]);
		} else {
			$this->productid = $data['productid'];
			$this->productnum = $data['num'];
			$this->userid = 1;
			$this->createtime = date('Y-m-d H:i:s', time());
			return (bool)$this->save();
		}
		return false;
	}

	public function getProducts()
	{
		return $this->hasOne(Product::className(), ['id' => 'productid']);
	}
}

?>