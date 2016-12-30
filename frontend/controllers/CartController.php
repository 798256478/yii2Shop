<?php

namespace frontend\controllers;

use frontend\controllers\BaseController;
use Yii;
use common\models\Cart;
use common\helper\Helper;
use yii\helpers\ArrayHelper;

/**
* 购物车
*/
class CartController extends BaseController
{

	public function actionIndex()
	{
		$this->layout = "layout1";
		return $this->render('index');
	}

	public function actionAdd()
	{
		$data = [];
		$model = new Cart;
		if(Yii::$app->request->isGet){
			$data['num'] = 1;
			$data['productid'] = Yii::$app->request->get('id');
		}

		if(Yii::$app->request->isPost){
			$data['num'] = Yii::$app->request->post('quantity');
			$data['productid'] = Yii::$app->request->post('id');
		}

		if($model->add($data)){
			$this->redirect('/cart/index');
		} else {
			Helper::setFlash('添加购物车失败');
		}
	}

	public function actionAddnum()
	{
		$model = Cart::find()->where('id = :id', [':id' => Yii::$app->request->get('id')])->one();
		Cart::updateAll(['productnum' => ($model->productnum + 1)], 'id = :id', [':id' => Yii::$app->request->get('id')]);
		$this->redirect('/cart/index');
		return;
	}

	public function actionSubnum()
	{
		$model = Cart::find()->where('id = :id', [':id' => Yii::$app->request->get('id')])->one();
		Cart::updateAll(['productnum' => ($model->productnum == 1 ? 1: $model->productnum - 1)], 'id = :id', [':id' => Yii::$app->request->get('id')]);
		$this->redirect('/cart/index');
		return;
	}
}
?>