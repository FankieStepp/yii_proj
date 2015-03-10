<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Добавить читателя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['id' => 'my-form']); ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'dept')->dropDownList(['Ит-отдел'=>'Ит-отдел', 'Бухгалтерия'=>'Бухгалтерия','Отдел продаж'=>'Отдел продаж','Отдел рекламы'=>'Отдел рекламы']); ?>
<?= Html::submitButton('Submit') ?>
<?php ActiveForm::end(); ?>

    <code><?= __FILE__ ?></code>
</div>
