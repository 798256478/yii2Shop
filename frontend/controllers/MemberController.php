<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
* 会员
*/
class MemberController extends Controller
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