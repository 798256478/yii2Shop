<?php
namespace frontend\controllers;

use yii\web\Controller;
use leyestd\alipay\Alipay;
use leyestd\alipay\lib\AlipaySubmit;

/**
* 订单
*/
class OrderController extends Controller
{
	public function actionIndex()
	{
		$this->layout = "layout2";
		return $this->render('index');
	}

	public function actionCheck()
	{
		$this->layout = "layout1";
		return $this->render('check');
	}

	public function actionPay(){
		$alipay=new Alipay("123456789", ltrim("测试"),0.01,"","http://www.excision.online","张三","河南","4500000","15737135239","15737135239");

		$html_text = (new AlipaySubmit($alipay->alipay_config))->buildRequestForm($alipay->parameter, "get", "确认");

		echo $html_text;
	}

}

?>