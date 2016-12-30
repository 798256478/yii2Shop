<?php
namespace backend\controllers;

use backend\controllers\BaseController;
use common\models\Category;
use Yii;
use common\helper\Helper;

/**
* 分类控制器
*/
class CategoryController extends BaseController
{
	private $model = '';
	public $layout = 'layout';

	public function init()
	{
		$this->model = new Category;
	}

	public function actionAddcategory()
	{
		if(Yii::$app->request->isPost){
			if($this->model->addcategory(Yii::$app->request->post())){
				Helper::setFlash('添加成功');
			} else {
				Helper::setFlash('添加失败');
			}
		}

		$this->model->title = "";
		return $this->render('addcategory', ['model' => $this->model, 'opts' => $this->getcategorylist()]);
	}

	public function actionCategorylist()
	{
		$cates = $this->model->getcategorylist();
		return $this->render('categorylist', ['model' => $this->model, 'cates' => $cates]);
	}

	public function actionMod()
	{
		$cate_id = Yii::$app->request->get('cateid');
		$model = Category::find()->where('id = :id', [':id' => $cate_id])->one();
		$selected = $model->parent_id;

		if(Yii::$app->request->isPost){
			if($model->load(Yii::$app->request->post()) && $model->save())
				Helper::setFlash('修改成功');
			else
				Helper::setFlash('修改失败');
		}

		$selected = Yii::$app->request->post('parent_id');
		return $this->render('modcate', ['model' => $model, 'selected' => $selected, 'opts' => $this->getcategorylist()]);
	}

	public function actionDel()
	{
		$cate_id = Yii::$app->request->get('cateid');
		if(Category::find()->where('parent_id = :id', [':id' => $cate_id])->all()){
			Helper::setFlash('此分类下有子分类，不能删除');
		} else {
			if(Category::deleteAll('id = :id', [':id' => $cate_id])){
				Helper::setFlash('删除成功');
			} else {
				Helper::setFlash('删除成功');
			}
		}

		return $this->redirect('categorylist');
	}

	private function getcategorylist()
	{
		$list = $this->model->getcategorylist();
		foreach ($list as $key => $value) {
			$list[$key] = $value['title'];
		}

		return $list;
	}



}
?>