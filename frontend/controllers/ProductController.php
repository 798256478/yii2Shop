<?php
namespace frontend\controllers;

use frontend\controllers\BaseController;
use yii\data\Pagination;
use common\models\Product;
use Yii;
/**
* 商品
*/
class ProductController extends BaseController
{
	public function actionIndex()
	{
		$product = Product::find();
		$count = $product->count();
		$pages = new Pagination(['totalCount' => $count, 'pageSize' => Yii::$app->params['pageSize']['product']]);
		$models = $product->offset($pages->offset)
				->limit($pages->limit)
				->all();
		$this->layout = "layout2";
		return $this->render('index', ['pages' => $pages, 'models' => $models]);
	}

	public function actionDetail()
	{
		$model = Product::find()->where('id = :id', [':id' => Yii::$app->request->get('id')])->one();
		$this->layout = "layout2";
		return $this->render('detail', ['model' => $model]);
	}
}
?>