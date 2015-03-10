<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Authors;

class AuthorsController extends Controller
{
    public function actionIndex()
	{
		$post = new Authors;
		$data = $post->find()->all();
		echo $this->render('index', array(
        'data' => $data
		));
	}
	
	public function actionCreate()
	{
		$model = new Authors;
		
		$model->load(Yii::$app->request->post());
		if ($model->save())
			return $this->actionIndex();
 
		echo $this->render('create', array(
			'model' => $model
		));
	}
	
	
	
}
