<?php
namespace frontend\controllers;

use frontend\controllers\BaseController;
use leyestd\alipay\Alipay;
use leyestd\alipay\lib\AlipaySubmit;
use common\models\Address;
use Yii;
use common\helper\Helper;

/**
* 订单
*/
class OrderController extends BaseController
{

	public function actionIndex()
	{
		$this->layout = "layout2";
		return $this->render('index');
	}

	public function actionCheck()
	{
		$address = new Address;
		$addresslist = Address::find()->where('userid = :id', [':id' => 1])->all();
		$express = Yii::$app->params['express'];
		$this->layout = "layout1";
		return $this->render('check', ['address' => $address, 'addresslist' => $addresslist, 'express' => $express]);
	}

	public function actionPay(){
		$alipay=new Alipay("123456789", ltrim("测试"),0.01,"","http://www.excision.online","张三","河南","4500000","15737135239","15737135239");

		$html_text = (new AlipaySubmit($alipay->alipay_config))->buildRequestForm($alipay->parameter, "get", "确认");

		echo $html_text;
	}

	public function actionCreateaddress()
	{
		$address = new Address;
		if(Yii::$app->request->isPost){
			$post = Yii::$app->request->post();
			if($address->load($post) && $address->validate()){
				$address->userid = 1;
				$address->createtime = date('Y-m-d H:i:s', time());
				if($address->save()){
					$this->redirect('/order/check');
				}else {
					Helper::setFlash("新建地址失败");
				}
			} 
		}
	}

}

?>