<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
* 支付
*/
class PayController extends Controller
{
	public function actionStatus()
	{
		$this->layout = "layout1";
		return $this->render("status");
	}

}
?>