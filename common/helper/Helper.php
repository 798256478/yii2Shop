<?php
namespace common\helper;

use Yii;


/**
* helper
*/
class Helper
{
	public static function setFlash($message)
	{
		Yii::$app->session->setFlash('message', $message);
	}
}

?>