<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumCategory */

$this->title = $model->aid;
$this->params['breadcrumbs'][] = ['label' => 'Album Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'aid' => $model->aid, 'cid' => $model->cid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'aid' => $model->aid, 'cid' => $model->cid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'aid',
            'cid',
        ],
    ]) ?>

</div>
