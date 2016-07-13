<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Admin;
use app\models\User;
use app\models\Userip;


class AdminController extends Controller
{
  public function actionIndex(){
  	return $this->render('index');
  }
   public function actionIpform(){
   	       $request = \YII::$app->request;
		if($request->isPost){
			$arr = $request ->post();
			$userip = new Userip;
			$userip ->ip_name = $arr['ip_name'];
			$userip ->ip_address = $arr['ip_address'];
			$sta = $userip ->save();
			if($sta){
				$this -> redirect(array('admin/iplist'));
			}
		}else{
			$this->layout = false;
			return $this->render('forms');
		}
   }
    public function actionIplist(){
		$this->layout = false;
		$arr = Userip::find()->asArray()->all();
		return $this->render('list',['arr' => $arr]);
	}

}
?>