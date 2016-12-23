<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
* 商品
*/
class ProductController extends Controller
{
	public function actionIndex()
	{
		$this->layout = "layout2";
		return $this->render('index');
	}

	public function actionDetail()
	{
		$this->layout = "layout2";
		return $this->render('detail');
	}
}
?>