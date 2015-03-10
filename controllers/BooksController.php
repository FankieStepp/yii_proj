<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Books;
use yii\db\Query;

class BooksController extends Controller
{
    public function actionIndex()
	{
		$post = new Books;
		$data = $post->find()->all();
		echo $this->render('index', array(
        'data' => $data
		));
	}
	
	public function actionRead($id=NULL)
	{
		if ($id === NULL)
            return -1;
		
		$post = new Books;
		
		if (isset($_POST['Authors']['id']))
		{
			$aid = 1*$_POST['Authors']['id'];
			// return "$aid , $id";
			
			$post->addAuthor($id, $aid);
		}
		
		if (isset($_POST['Readers']['id']))
		{
			$uid = 1*$_POST['Readers']['id'];
			
			$post = new Books;
			$data = $post->find()->where(['id' => $id])->one();
			$data->reader = $uid;
			$data->save();
		}
			
		$data = $post->find()->where(['id' => $id])->one();
		
		if ($post === NULL)
            return -1;
		
		echo $this->render('read', array(
        'data' => $data
		));
	}
	
	public function actionUnlink($id=NULL)
	{	
		$post = new Books;
		$data = $post->find()->where(['id' => $id])->one();
		
		//if ($post === NULL)
        //    return -1;
		
		$data->reader = 0;
		$data->save();
		
		echo $this->render('read', array(
        'data' => $data
		));
	}
	
	public function actionCreate()
	{
		$model = new Books;
		
		$model->load(Yii::$app->request->post());
		if ($model->save())
			return $this->actionIndex();
 
		echo $this->render('create', array(
			'model' => $model
		));
	}
	
	
	
}
