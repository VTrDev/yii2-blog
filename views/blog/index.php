<?php

use vtrdev\blog\models\Blog;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel vtrdev\blog\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <?php Pjax::begin([
        'enablePushState' => false
    ]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Blog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {check}',
                'buttons' => [
                    /*'update' => function($url, $model, $key) {
                        return Html::a('Изменить', $url);
                    },*/
                    'check' => function($url, $model, $key) {
                        return Html::a('<i class="fa fa-check" aria-hidden="true"></i>', $url);
                    }
                ],
                'visibleButtons' => [
                    'check' => function($model, $key, $url) {
                        return $model->status_id;
                    },
                ]
            ],
            'id',
            'title',
            [
                'attribute' => 'url',
                'format' => 'text',
                'headerOptions' => ['class' => 'text-center']
            ],
            [
                'attribute' => 'status_id',
                'filter' => Blog::STATUS_LIST,
                'value' => 'statusName',
            ],
            'sort',
            'smallImage:image',
            'date_create:datetime',
            'date_update:datetime',
            [
                'attribute' => 'tags',
                'value' => 'tagsAsString',
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <?php Pjax::begin([
        'enablePushState' => false
    ]); ?>
    <a href="/blog/blog/trulyalyalya" class="btn btn-xs btn-primary" data-pjax="0">жми сюда</a>
    <?php Pjax::end(); ?>

</div>
