<?php
namespace backend\controllers;

use backend\controllers\BaseController;
use common\models\Category;
use Yii;

/**
* 分类控制器
*/
class CategoryController extends BaseController
{
	public function actionAddcategory()
	{
		$model = new Category;

		if(Yii::$app->request->isPost){
			if($model->addcategory(Yii::$app->request->post())){
				Yii::$app->session->setFlash('addcategory', '添加成功');
			} else {
				Yii::$app->session->setFlash('addcategory', '添加失败');
			}
		}

		$list = $model->getcategorylist();
		foreach ($list as $key => $value) {
			$list[$key] = $value['title'];
		}
		$opts = ['顶级分类'] + $list;

		$model->title = "";
		$this->layout = 'layout';
		return $this->render('addcategory', ['model' => $model, 'opts' => $opts]);
	}

	public function actionCategorylist()
	{
		$model = new Category;
		$cates = $model->getcategorylist();
		$this->layout = "layout";
		return $this->render('categorylist', ['model' => $model, 'cates' => $cates]);
	}

}
?>