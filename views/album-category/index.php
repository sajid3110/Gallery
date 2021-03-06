<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Album Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Album Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'aid',
            'cid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
