<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Список книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<h3>Добро пожаловать в систему управления корпоративной библиотекой. Система позволяет добавлять книги, добавлять авторов,
	привязывать авторов к книгам, добавлять читателей, а также привязывать и отвязывать книги к соответствующим читателям.
	
	</h3>
    <h1><?= Html::encode($this->title) ?> </h1>
	 <div style="float: right;margin: 5px;"> <?php echo Html::a('Добавить книгу', array('books/create'), ['class'=>'btn btn-primary']); ?></div><br>
	 
	
	 
	<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Название</td>
		<td>Авторы</td>
        <td>Добавлен</td>
        <td>Изменен</td>
		<td></td>
    </tr>
    <?php foreach ($data as $author): ?>
        <tr>
            <td>
                <?php echo Html::a($author->id, array('books/read', 'id'=>$author->id)); ?>
            </td>
            <td><?php echo Html::a($author->name, array('books/read', 'id'=>$author->id)); ?></td>
			<td><?php echo $author->getAuthors($author->id); ?></td>
            <td><?php echo $author->creat; ?></td>
             <td><?php echo $author->upd; ?></td>
			 <td><?php if ($author->reader) echo "Книга занята"; ?></td>

        </tr>
    <?php endforeach; ?>
	</table>

	<hr>
	<h3>Отчеты</h3>
	<?php echo Html::a("&curren; Спискок авторов, чьи книги в данный момент читает более трех читателей", array('report/index')); ?><br><br>
	<?php echo Html::a("&curren; Список книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов.", array('report/index2')); ?><br><br>
	<?php echo Html::a("&curren; Пять случайных книг", array('report/random')); ?><br><br>

    <code><?= __FILE__ ?></code>
</div>
