<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\Admin;
use Yii;
/**
* 后台管理员控制器
*/
class AdminController extends Controller
{
	public function actionLogin()
	{
		$this->layout = false;

		$model = new Admin;

		if(Yii::$app->request->isPost){
			if($model->login(Yii::$app->request->post())){
				$this->redirect(['index/index']);
				Yii::$app->end();       //redirect不能终止程序，必须使用return或yii::$app->end()终止程序
			}
		}

		$data = [
			'model' => $model,
		];

		return $this->render("login", $data);
	}

	public function actionSeekpassword()
	{
		$this->layout = false;
		$model = new Admin;

		if(Yii::$app->request->isPost){
			if($model->seekpassword(Yii::$app->request->post())){
				$this->redirect(['admin/login']);
				Yii::$app->end();
			}
		}

		$data = [
			'model' => $model,
		];
		return $this->render("seekpassword", $data);
	}

	public function actionMailchangepass()
	{
		$model = new Admin;
		
		$this->layout = false;

		$get = Yii::$app->request->get();

		if($get['token'] != $model->createToken($get['username'], $get['timestamp']) || $get['timestamp'] + 5 * 60 < time()){
			$this->redirect(['admin/login']);
			Yii::$app->end();
		}

		if(Yii::$app->request->isPost){
			if($model->mailchangepassword($get['username'], Yii::$app->request->post())){
				$this->redirect(['admin/login']);
			    Yii::$app->end();
			}
		}

		$data = [
			'model' => $model,
		];
		
		return $this->render('mailchangepass', $data);
	}



}
?>