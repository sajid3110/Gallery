<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Album;
use app\models\Categories;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AlbumCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'aid')->textInput() ?> -->
    <?= $form->field($model,'aid')->dropDownList(
        ArrayHelper::map(Album::find()->all(), 'aid','aname'),
        ['prompt'=>'Select Album']
    ) ?>

     <!-- <?= $form->field($model, 'cid')->textInput() ?>  -->
    <?= $form->field($model,'cid')->dropDownList(
        ArrayHelper::map(Categories::find()->all(), 'cid','cname'),
        ['prompt'=>'Select Category']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
