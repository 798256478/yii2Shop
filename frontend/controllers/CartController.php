<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
* 购物车
*/
class CartController extends Controller
{
	public function actionIndex()
	{
		$this->layout = "layout1";
		return $this->render('index');
	}
}
?>