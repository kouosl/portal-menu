<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kouosl\menu\models\MenuItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'label',
            'link',
            'target',
            'type',
            //'parent',
            //'menu_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
