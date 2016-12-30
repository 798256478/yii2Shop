<?php
namespace common\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

	const AK = 'RFchPlpU1OrYxeNY5jInG7tVZNyRlx9egbqvTz4U';
	const SK = '4eHG06YB7VmjOWFOn-9z2QiadF-t5I6zoZceVk63';
	const DOMAIN = 'ois1zdi50.bkt.clouddn.com';
	const BUCKET = 'zhaowenbin';

	public static function tableName()
	{
		return "products";
	}

	public function attributeLabels()
	{
		return [
			'cate_id' => '分类',
			'name' => '名称',
			'cover' => '封面',
			'price' => '价格',
			'image' => '图片',
			'intro' => '描述',
			'num' => '库存',
			'ishot' => '是否热卖',
			'isrecommend' => '是否推荐',
			'ison' => '是否上架',
		];
	}

	public function rules()
	{
		return [
			['cate_id', 'required', 'message' => '分类不能为空'],
			['name', 'required', 'message' => '名称不能为空'],
			['cover', 'required', 'message' => '封面不能为空', 'on' => 'addproduct'],
			['price', 'required', 'message' => '价格不能为空'],
			['image', 'required', 'message' => '图片不能为空'],
			['num', 'required', 'message' => '库存不能为空'],
			[['ishot', 'isrecommend', 'ison'], 'required', 'message' => '不能为空'],
			['intro', 'safe'],
		];
	}

	public function addproduct($post)
	{
		$this->scenario = 'addproduct';
		if($this->load($post) && $this->validate()){
			$this->createtime = date('Y-m-d H:i:s');
			$this->image = json_encode($this->image);
			return (bool)$this->save();
		}
		return false;
	}

}
?>