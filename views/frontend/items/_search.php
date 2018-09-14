<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model kouosl\menu\models\MenuItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'label') ?>

    <?= $form->field($model, 'link') ?>

    <?= $form->field($model, 'target') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'parent') ?>

    <?php // echo $form->field($model, 'menu_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
