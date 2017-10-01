<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\Photos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'pname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model,'cid')->dropDownList(
        ArrayHelper::map(Categories::find()->all(), 'cid','cname'),
        ['prompt'=>'Select Category']
    ) ?>  
    <?= $form->field($model, 'plink')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
