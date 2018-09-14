<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kouosl\menu\models\Menu;    
/* @var $this yii\web\View */
/* @var $model kouosl\menu\models\MenuItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'menu_id')->dropDownList(
            ArrayHelper::map(Menu::find()->all(),'id','name'),
            ['prompt' => 'Select Parent Menu']
    ) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
