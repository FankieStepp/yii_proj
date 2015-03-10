<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Readers;
use app\models\Authors;

/* @var $this yii\web\View */
$this->title = 'Список книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><? echo $data->name; ?> </h1>
	<table><tr><td width=400>

	<b>Авторы:</b><br>
	<?php echo $data->getAuthors($data->id); ?><br>
	
	<?
			$form = ActiveForm::begin(['id' => 'authors-form','options' => ['class' => 'form-horizontal' ],]);

			$model2 = new Authors;
			echo Html::activeDropDownList($model2, 'id',
			ArrayHelper::map(Authors::find()->all(), 'id', 'name'));
			echo Html::submitButton('Добавить автора');
			ActiveForm::end();
	?>
	<br>
	    Дата внесения в базу: <?php echo $data->creat; ?><br>
		Дата последнего изменения: <?php echo $data->upd; ?><br><br>
	</td><td>
		<? 
		if ($data->pic)
			echo "<img src=/basic/web/".$data->pic." style='float: right;' width=200>";
	?>
	</td></tr></table>
	<hr>
	<?php if ($data->reader)
		{ 
			echo "Книга занята! <br>"; 
			echo Html::a('Освободить книгу (отвязать от читателя)', array('books/unlink', 'id'=>$data->id), ['class'=>'btn btn-primary']); 
		} else {
			echo "<b>Привязать к пользователю?</b><br>";
			
			$form = ActiveForm::begin(['id' => 'active-form','options' => ['class' => 'form-horizontal' ],]);

			$model = new Readers;
			echo Html::activeDropDownList($model, 'id',
		ArrayHelper::map(Readers::find()->all(), 'id', 'name'));
			echo Html::submitButton('Привязать');
			ActiveForm::end();

		}
	?>
	<br><br>
    <code><?= __FILE__ ?></code>
</div>
