<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Comprasrealiz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comprasrealiz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'condomino_id')->textInput() ?>

    <?= $form->field($model, 'cnpj_empresaconv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'local_compra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descr_servmercad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_horario')->textInput() ?>

    <?= $form->field($model, 'total_pago')->textInput() ?>

    <?= $form->field($model, 'forma_pagto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dat_hora_leitura')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
