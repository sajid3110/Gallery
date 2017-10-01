<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhotosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Photos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Photos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pid',
            'pname',
            'cid',
            [
            'format' => 'html',      
            'attribute' => 'plink',    
            'value' => function ($model) {
             return Html::img($model->plink,['class'=>'col-md-10']);
            },
            'options' => ['class' => 'col-md-3'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
