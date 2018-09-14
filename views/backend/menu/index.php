<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel kouosl\menu\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'position',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {myButton}',  // the default buttons + your custom button
                'buttons' => [
                    'myButton' => function($url, $model, $key) {     // render your custom button
                        // return Html::a('Items', ['/menu/items/?id='.$key]);
                        // return Html::a('<span class="fa fa-search"></span>İtems', '/menu/items/?id='.$key, [
                        //     'title' => Yii::t('app', 'View'),
                        //     'class'=>'btn btn-primary btn-xs',                                  
                        //   ]);
                        return Html::a(
                            '<span class="glyphicon glyphicon-cog"></span>',
                            '/admin/menu/items/?id='.$key, 
                            [
                                'title' => 'Items',
                            ]
                        );
                    }
                    
                ]
            ]
        ],
    ]); ?>
</div>
