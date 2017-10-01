<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AlbumCategory */

$this->title = 'Create Album Category';
$this->params['breadcrumbs'][] = ['label' => 'Album Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
