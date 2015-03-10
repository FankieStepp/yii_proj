<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Вывод пяти случайных книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?> </h1>
	 <div style="float: right;margin: 5px;"></div><br>
	<table>
	<tr>
	<th width=340>Название</th>
	<th width=200 >Дата внесения в базу</th>
	<th width=200 >Дата изменения</th>
	</tr>
<?  

	
	for ($i=0; $i<count($data); $i++)
	{
		$book = $data[$i]['name'];
		$created =  $data[$i]['creat'];
		$updated =  $data[$i]['upd'];
		
		echo "<tr><td width=340>$book</td><td>$created</td><td>$updated</td></tr>\n";
		
	} 
?>
	</table>
<br>

    <code><?= __FILE__ ?></code>
</div>
