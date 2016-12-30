<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\BaseController;

class IndexController extends BaseController
{
    public function actionIndex()
    {

        $this->layout = 'layout1';
        return $this->render('index');
    }
}
