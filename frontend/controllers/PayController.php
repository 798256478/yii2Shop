<?php
namespace frontend\controllers;

use frontend\controllers\BaseController;

/**
* 支付
*/
class PayController extends BaseController
{
	public function actionStatus()
	{
		$this->layout = "layout1";
		return $this->render("status");
	}

}
?>