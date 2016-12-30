<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;

/**
* 基类Controller
*/
class BaseController extends Controller
{
	public $layout = 'layout';
	public function init() {
		if(!isset(Yii::$app->session['admin']['isLogin'])){
			return $this->redirect(["/admin/login"]);
		}
	}
}

?>