<?php
namespace frontend\controllers;

use frontend\controllers\BaseController;

/**
* 会员
*/
class MemberController extends BaseController
{
	public function actionAuth()
	{
		$this->layout = "layout2";
		return $this->render('auth');
	}

	public function actionQqreg()
	{
		$this->layout = false;
		return $this->render('qqreg');
	}
}
?>