<?php

namespace backend\controllers;

use backend\controllers\BaseController;

/**
 * Default controller for the `backend` module
 */
class IndexController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$this->layout = "layout";
        return $this->render('index');
    }
}
