<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;
/**
* 管理员模型
*/
class Admin extends ActiveRecord
{
	public $rememberMe = true;
	public $confirmpassword = '';

	public static function tableName()
	{
		return "admins";
	}

	public function attributeLabels() 
	{
		return [
			'username' => '用户名',
			'email' => '邮箱',
			'password' => '密码',
			'confirmpassword' => '确认密码',
		];
	}

	public function rules()
	{
		return [
			['username', 'required', 'message' => '用户名不能为空', 'on' => ['login', 'seekpassword', 'addadmin', 'changeemail']],
			['password', 'required', 'message' => '密码不能为空', 'on' => ['login', 'mailchangepassword', 'addadmin', 'changeemail', 'changepassword']],
			['password', 'validatePassword', 'on' => ['login', 'changeemail']],
			['email', 'required', 'message' => '邮箱不能为空', 'on' => ['seekpassword', 'addadmin', 'changeemail']],
			['email', 'email', 'message' => '邮箱格式不正确', 'on' => ['seekpassword', 'addadmin', 'changeemail']],
			['email', 'validateEmail', 'on' => ['seekpassword']],
			['email', 'unique', 'message' => '邮箱已被注册', 'on' => ['addadmin', 'changeemail']],
			['username', 'unique', 'message' => '管理员已存在', 'on' => ['addadmin']],
			['confirmpassword', 'required', 'message' => '确认密码不能为空', 'on' => ['mailchangepassword', 'addadmin', 'changepassword']],
			['confirmpassword', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码输入不一致', 
			'on' => ['mailchangepassword', 'addadmin', 'changepassword']],
		];
	}

	public function validatePassword()
	{
		if(!$this->hasErrors()){
			$data = self::find()
					->where('username = :username and password = :password', [':username' => $this->username, ':password' => md5($this->password)])
					->one();
			if(is_null($data)){
				$this->addError('password', '用户名或密码错误');
			}
		}
	}

	public function login($post)
	{
		$this->scenario = "login";
		if($this->load($post) && $this->validate()){
			$leftTime = $post['Admin']['rememberMe'] ? 24 * 3600 : 0;
			$session = Yii::$app->session;
			session_set_cookie_params($leftTime);
			$session['admin'] = [
				'username' => $this->username,
				'isLogin' => 1,
 			];

 			$this->updateAll(["logintime" => date("Y-m-d h:i:s"), "loginip" => ip2long(Yii::$app->request->userIP)], "username = :username", [':username' => $this->username]);
 			return (bool)$session['admin']['isLogin'];
		}

		return false;
	}

	public function validateEmail()
	{
		if(!$this->hasErrors()){
			$data = self::find()->where("username = :username and email = :email", [':username' => $this->username, ':email' => $this->email])
					->one();
			if(is_null($data)){
				$this->addError('email', '邮箱输入不正确');
			}
		}
	}

	public function seekpassword($post)
	{
		$this->scenario = 'seekpassword';
		if($this->load($post) && $this->validate()){
			$time = time();
			$mailer = Yii::$app->mailer->compose('seekpassword', ['username' => $this->username, 'time' => $time, 'token' => $this->createToken($post['Admin']['username'], $time)])
				->setFrom('798256478@qq.com')
				->setTo($post['Admin']['email'])
				->setSubject("Yii2商城-找回密码");
			var_dump($mailer->send());
			if($mailer->send()){
				return true;
			}
		}
		return false;
	}

	public function createToken($username, $time)
	{
		return md5(md5($username).base64_encode(Yii::$app->request->userIP).md5($time));
	}

	public function mailchangepassword($username, $post)
	{
		$this->scenario = 'mailchangepassword';

		if($this->load($post) && $this->validate()){
			return (bool)$this->updateAll(['password' => md5($post['Admin']['password'])], 'username = :username', [':username' => $username]);
		}

		return false;
	}

	public function addadmin($post)
	{
		$this->scenario = "addadmin";
		if($this->load($post) && $this->validate()){
			$this->password = md5($this->password);
			$this->create_at = date('Y-m-d H:i:s', time());
			if($this->save(false)){
				return true;
			}
		}
		return false;
	}

	public function changeemail($post)
	{
		$this->scenario = 'changeemail';
		if($this->load($post) && $this->validate()){
			return (bool) $this->updateAll(['email' => $this->email], 'username = :username', [':username' => $this->username]);
		}
		return false;
	}

	public function changepassword($post)
	{
		$this->scenario = "changepassword";

		if($this->load($post) && $this->validate()){
			return (bool)$this->updateAll(['password' => md5($this->password)], 'username = :username', [':username' => $this->username]);
		}

		return false;
	}
}

?>