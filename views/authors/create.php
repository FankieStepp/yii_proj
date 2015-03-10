<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Добавить автора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['id' => 'my-form']); ?>
<?= $form->field($model, 'name') ?>
<?= Html::submitButton('Submit') ?>
<?php ActiveForm::end(); ?>

    <code><?= __FILE__ ?></code>
</div>
