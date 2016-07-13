<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Admin;
use app\models\User;


class LoginController extends Controller
{
    public function actionLogin()
    {
    	return $this->renderPartial('login');
	}

	public function actionLoginsign()
    {
    	$user_data = \Yii::$app->request->post();
        //print_r($user_data);die;
		unset($user_data['_csrf']);
		//echo $_SERVER["REMOTE_ADDR"];
		
		$admin_data = Admin::find()->where(['username'=>$user_data['username'],'password'=>$user_data['password']])->asArray()->one();
		//print_r($admin_data);die;
		if (isset($admin_data)) {
			
				 //$data['username'] = $session['username'];
			 	 $this -> redirect(array('/admin/index'));
		
		}else{
			echo "用户名或密码错误";
		}
	}
}



?>