<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumCategory */

$this->title = 'Update Album Category: ' . $model->aid;
$this->params['breadcrumbs'][] = ['label' => 'Album Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aid, 'url' => ['view', 'aid' => $model->aid, 'cid' => $model->cid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="album-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
