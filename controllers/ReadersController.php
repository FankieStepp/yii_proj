<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Readers;

class ReadersController extends Controller
{
    public function actionIndex()
	{
		$post = new Readers;
		$data = $post->find()->all();
		echo $this->render('index', array(
        'data' => $data
		));
	}
	
	public function actionCreate()
	{
		$model = new Readers;
		
		$model->load(Yii::$app->request->post());
		if ($model->save())
			return $this->actionIndex();
 
		echo $this->render('create', array(
			'model' => $model
		));
	}
	
	
	
}
