<?php
namespace backend\controllers;

use backend\controllers\BaseController;
use backend\models\Admin;
use yii\data\Pagination;
use Yii;

/**
* 管理控制器
*/
class ManagerController extends BaseController
{

	private function getCurrentAdmin()
	{
		return Admin::find()->where("username = :username", [':username' => Yii::$app->session['admin']['username']])->one();
	}

	public function actionAdminlist()
	{
		$query = Admin::find();
		$countQuery = clone $query;
		$pageSize = Yii::$app->params['pageSize']['manager'];
		$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => $pageSize]);
		$models = $query->offset($pages->offset)
				->limit($pages->limit)
				->all();
		$this->layout = "layout";
		return $this->render("adminlist", ['models' => $models, 'pages' => $pages,]);
	}

	public function actionAddadmin()
	{
		$model = new Admin;
		if(Yii::$app->request->isPost){
			if($model->addadmin(Yii::$app->request->post())){
				Yii::$app->session->setFlash("addadmin", "管理员添加成功");
			}
		}
		$model->password = "";
		$model->confirmpassword = "";
		$this->layout = "layout";
		return $this->render("addadmin", ['model' => $model,]);
	}

	public function actionDel() 
	{
		$id = Yii::$app->request->get('id');
		if(Admin::deleteAll('id = :id', [':id' => $id])){
			Yii::$app->session->setFlash('del', '删除成功');
		} else {
			Yii::$app->session->setFlash('del', '删除失败');
		}
		$this->redirect(['/manager/adminlist']);
		Yii::$app->end();
	}

	public function actionChangeemail()
	{
		$model = $this->getCurrentAdmin();
		if(Yii::$app->request->isPost){
			if($model->changeemail(Yii::$app->request->post())){
				Yii::$app->session->setFlash('changeemail', "修改成功");
			} else{
				Yii::$app->session->setFlash('changeemail', "修改失败");
			}
		}
		$model->password = '';
		$model->email = ''; 
		$this->layout = "layout";
		return  $this->render('changeemail', ['model' => $model]);
	}

	public function actionChangepassword()
	{
		$model = $this->getCurrentAdmin();

		if(Yii::$app->request->isPost){
			if($model->changepassword(Yii::$app->request->post())){
				Yii::$app->session->setFlash('changepassword', '修改成功');
			} else {
				Yii::$app->session->setFlash('changepassword', '修改失败');
			}
		}
		$model->password = '';
		$model->confirmpassword = '';
		$this->layout = 'layout';
		return $this->render('changepassword', ['model' => $model]);
	}
}
?>