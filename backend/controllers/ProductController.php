<?php
namespace backend\controllers;

use backend\controllers\BaseController;
use common\models\Product;

/**
* 商品控制器
*/
class ProductController extends BaseController
{
	public function actionAddproduct()
	{
		$model = new Product;
		$this->layout = 'layout';
		return $this->render('addproduct', ['model' => $model]);
	}
}
?>