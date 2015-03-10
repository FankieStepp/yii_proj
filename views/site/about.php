<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Список книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

	<table class="table table-striped table-hover">
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Author</td>
        <td>Free</td>
    </tr>
    <?php foreach ($data as $book): ?>
        <tr>
            <td>
                <?php echo Html::a($book->id, array('site/read', 'id'=>$book->id)); ?>
            </td>
            <td><?php echo Html::a($book->name, array('site/read', 'id'=>$book->id)); ?></td>
            <td><?php echo $book->author; ?></td>
            <td><?php if ($book->free) echo "Доступна."; ?></td>

        </tr>
    <?php endforeach; ?>
	</table>


    <code><?= __FILE__ ?></code>
</div>
