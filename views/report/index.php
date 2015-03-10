<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Спискок авторов, чьи книги в данный момент читает более трех читателей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?> </h1>
	 <div style="float: right;margin: 5px;"></div><br>
	<table>
	<tr>
	<th>Автор</th>
	<th>Количество читаемых книг</th>
	</tr>
<?  

	
	for ($i=0; $i<count($data); $i++)
	{
		$author = $data[$i]['name'];
		//$count =  $data[$i]['count(books.id)'];
		$count =  $data[$i]['counter'];
		
		echo "<tr><td width=340>$author</td><td>$count</td></tr>\n";
		
	} 
?>
	</table>
<br>

    <code><?= __FILE__ ?></code>
</div>
