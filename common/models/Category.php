<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
* 
*/
class Category extends ActiveRecord
{
	public static function tableName()
	{
		return "category";
	}

	public function attributeLabels()
	{
		return [
			'parent_id' => '父级分类',
			'title' => '分类名称',
		];
	}

	public function rules()
	{
		return [
			['title', 'required', 'message' => '分类名称不能为空'],
			['parent_id', 'safe'],
		];
	}

	public function getcategorydata($parent_id = 0)
	{ 
		$list = [];
		foreach (ArrayHelper::toArray($this->find()->all()) as $cate) {
			if($cate['parent_id'] == $parent_id){
				$list[$cate['id']] = $cate;
				$list = $list + $this->getcategorydata($cate['id']);
			}
		}

		return $list;
	}

	public function getcategorylist()
	{
		$list = $this->getcategorydata();
		foreach ($list as $key => $value) {
			$num = $this->hasParent($list, $value['parent_id']);
			$list[$key]['title'] = str_repeat("---------|", $num + 1).$value['title'];
		}

		return $list;
	}

	private function hasParent($list, $parent_id, $num = 0)
	{
		if($parent_id != 0 && array_key_exists($parent_id, $list)){
			$num = $this->hasParent($list, $list[$parent_id]['parent_id'], ++$num);
		}
		return $num;
	}


	public function addcategory($post)
	{
		if($this->load($post) && $this->validate()){
			$this->create_time = date('Y-m-d H:i:s', time());
			return $this->save(false);
		}
		return false;
	}
}
?>