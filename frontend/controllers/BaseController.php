<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Product;
use common\models\Cart;

/**
* 前台基础控制器
*/
class BaseController extends Controller
{
	
	public function init()
	{
        $cart = Cart::find()->with('products')->where('userid = :id', [':id' => 1])->all();
        $totalnum = 0;
        $totalprice = 0;
        foreach ($cart as $key => $value) {
            $totalnum += $value->productnum;
            $totalprice += $value->productnum * $value->products->price;
        }

		$category = ArrayHelper::toArray(Category::find()->select(['id', 'title'])->where('parent_id = 0')->all());
    	foreach ($category as $key => $value) {
    		$category[$key]['children'] = ArrayHelper::toArray(Category::find()->select(['id', 'title'])->where('parent_id = :id', [':id' => $value['id']])->all());
    	}

    	$hot = Product::find()->where('ishot = "1"')->all();
    	$recommend = Product::find()->where('isrecommend = "1"')->all();

    	$this->view->params['category'] = $category;
    	$this->view->params['hot'] = $hot;
    	$this->view->params['recommend'] = $recommend;
        $this->view->params['cart'] = $cart;
        $this->view->params['totalnum'] = $totalnum;
        $this->view->params['totalprice'] = $totalprice;
	}
}

?>