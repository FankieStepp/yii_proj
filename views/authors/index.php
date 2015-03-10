<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Список авторов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?> </h1>
	 <div style="float: right;margin: 5px;"> <?php echo Html::a('Добавить автора', array('authors/create'), ['class'=>'btn btn-primary']); ?></div><br>
	<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Добавлен</td>
        <td>Изменен</td>
    </tr>
    <?php foreach ($data as $author): ?>
        <tr>
            <td>
                <?php echo Html::a($author->id, array('site/read', 'id'=>$author->id)); ?>
            </td>
            <td><?php echo Html::a($author->name, array('site/read', 'id'=>$author->id)); ?></td>
            <td><?php echo $author->creat; ?></td>
             <td><?php echo $author->upd; ?></td>

        </tr>
    <?php endforeach; ?>
	</table>


    <code><?= __FILE__ ?></code>
</div>
