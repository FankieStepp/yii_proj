<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Данные о книге';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

	<div class="pull-right btn-group">
    <?php echo Html::a('Update', array('site/update', 'id' => $post->id), array('class' => 'btn btn-primary')); ?>
    <?php echo Html::a('Delete', array('site/delete', 'id' => $post->id), array('class' => 'btn btn-danger')); ?>
	</div>
 
	<h1><?php echo $post->title; ?></h1>
	<p><?php echo $post->content; ?></p>
	<hr />
	<time>Created On: <?php echo $post->created; ?></time><br />
	<time>Updated On: <?php echo $post->updated; ?></time>

    <code><?= __FILE__ ?></code>
</div>
