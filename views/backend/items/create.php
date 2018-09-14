<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kouosl\menu\models\MenuItems */

$this->title = 'Create Menu Items';
$this->params['breadcrumbs'][] = ['label' => 'Menu Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
