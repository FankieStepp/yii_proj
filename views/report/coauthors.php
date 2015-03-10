<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Спискок книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?> </h1>
	 <div style="float: right;margin: 5px;"></div><br>
	<table>
	<tr>
	<th>Книга</th>
	<th>Число со-авторов</th>
	</tr>
<?  

	
	for ($i=0; $i<count($data); $i++)
	{
		$book = $data[$i]['name'];
		//$count =  $data[$i]['count(books.id)'];
		$count =  $data[$i]['counter'];
		
		echo "<tr><td width=340>$book</td><td>$count</td></tr>\n";
		
	} 
?>
	</table>
<br>

    <code><?= __FILE__ ?></code>
</div>
