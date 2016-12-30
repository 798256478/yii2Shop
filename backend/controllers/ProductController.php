<?php
namespace backend\controllers;

use backend\controllers\BaseController;
use common\models\Product;
use backend\controllers\CategoryController;
use common\models\Category;
use Yii;
use crazyfd\qiniu\Qiniu;
use common\helper\Helper;
use yii\data\Pagination;

/**
* 商品控制器
*/
class ProductController extends BaseController
{
	public function actionAddproduct()
	{
		$model = new Product;
		$category = new Category;
		if(Yii::$app->request->isPost){
			$post = Yii::$app->request->post();
			$images = $this->uploadImage();
			if(!$images){
				$model->addError('cover', '封面不能为空');
			}else{
				$post['Product']['cover'] = $images['cover'];
				$post['Product']['image'] = $images['image'];
			}
			if($model->addproduct($post)){
				Helper::setFlash('添加成功');
			} else {
				Helper::setFlash('添加失败');
			}		
		}
		$model = new Product;
		return $this->render('addproduct', ['model' => $model, 'opts' => $this->getcategorylist()]);
	}

	public function actionProductlist()
	{
		$query = Product::find();
		$count = $query->count();
		$pageSize = Yii::$app->params['pageSize']['product'];
		$pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
		$products = $query->offset($pager->offset)->limit($pager->limit)->all();
		return $this->render('productlist',['products' => $products, 'pager' => $pager]);
	}

	public function actionMod()
	{
		$model = Product::find()->where('id = :id', [':id' => Yii::$app->request->get('id')])->one();
		if(Yii::$app->request->isPost){
			$images = $this->uploadImage($model);
			$post = Yii::$app->request->post();
			if($model->load($post) && $model->validate()){
				$model->cover = $images['cover'] == '' ? $model->cover : $images['cover'];
				$model->image = json_encode($images['image']);
				if($model->save(false)){
					Helper::setFlash("修改成功");
				} else {
					Helper::setFlash("修改失败");
				}
			} 
		}
		return $this->render('addproduct', ['model' => $model, 'opts' => $this->getcategorylist()]);
	}

	public function actionOn()
	{
		if((bool)Product::updateAll(['ison' => 1], 'id = :id', [':id' => Yii::$app->request->get('id')])){
			Helper::setFlash("商品已上架");
		} else {
			Helper::setFlash("商品上架失败");
		}
		$this->redirect(['product/productlist']);
		return;
	}

	public function actionOff()
	{
		if((bool)Product::updateAll(['ison' => 0], 'id = :id', [':id' => Yii::$app->request->get('id')])){
			Helper::setFlash("商品已下架");
		} else {
			Helper::setFlash("商品下架失败");
		}
		$this->redirect(['product/productlist']);
		return;
	}

	public function actionDel()
	{
		$id = Yii::$app->request->get('id');
		$model = Product::find()->where('id = :id', [':id' => $id])->one();
		$qiniu = new Qiniu(Product::AK, Product::SK, Product::DOMAIN, Product::BUCKET);
		$qiniu->delete(basename($model->cover));
		foreach (json_decode($model->image) as $key => $value) {
			$qiniu->delete($key);
		}
		if((bool)Product::deleteAll('id = :id', ['id' => $id])){
			Helper::setFlash("商品已删除");
		} else {
			Helper::setFlash("商品删除失败");
		}
		$this->redirect(['product/productlist']);
		return;
	}

	public function actionRemovepic()
	{
		$id = Yii::$app->request->get('id');
		$model = Product::find()->where('id = :id', [':id' => $id])->one();
		$pickey = Yii::$app->request->get('key');
		$images = (array)json_decode($model->image);
		$qiniu = new Qiniu(Product::AK, Product::SK, Product::DOMAIN, Product::BUCKET);
		$qiniu->delete($pickey);
		unset($images[$pickey]);
		Product::updateAll(['image' => json_encode($images)], 'id = :id', [':id' => $id]);
		return $this->redirect(['product/mod', 'id' => $id]);
	}

	private function getcategorylist()
	{
		$category = new Category;
		$list = $category->getcategorylist();
		foreach ($list as $key => $value) {
			$list[$key] = $value['title'];
		}
		return $list;
	}

	private function uploadImage($model = null)
	{
		$qiniu = new Qiniu(Product::AK, Product::SK, Product::DOMAIN, Product::BUCKET);
		$cover = '';
		if($_FILES['Product']['name']['cover']){
			if($_FILES['Product']['error']['cover'] > 0){
				return false;
			}
			$key = uniqid();
			$qiniu->uploadFile($_FILES['Product']['tmp_name']['cover'], $key);
			$cover = $qiniu->getLink($key);
			if($model != null){
			$qiniu->delete(basename($model->cover));

			}
		}
		$image = [];
		foreach ($_FILES['Product']['tmp_name']['image'] as $key => $value) {
			if($_FILES['Product']['error']['image'][$key] > 0){
				continue;
			}
			$key = uniqid();
			$qiniu->uploadFile($value, $key);
			$image[$key] = $qiniu->getLink($key);
		}
		if($model != null){
			$image = (array)json_decode($model->image) + $image;
		}
		return ['cover' => $cover, 'image' => $image];
	}

}
?>