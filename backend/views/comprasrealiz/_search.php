<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ComprasrealizSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comprasrealiz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_compras') ?>

    <?= $form->field($model, 'condomino_id') ?>

    <?= $form->field($model, 'cnpj_empresaconv') ?>

    <?= $form->field($model, 'nfnum') ?>

    <?= $form->field($model, 'compravalida') ?>

    <?php // echo $form->field($model, 'descr_servmercad') ?>

    <?php // echo $form->field($model, 'data_horario') ?>

    <?php // echo $form->field($model, 'total_pago') ?>

    <?php // echo $form->field($model, 'urlnfsefaz') ?>

    <?php // echo $form->field($model, 'valretornocashback') ?>

    <?php // echo $form->field($model, 'forma_pagto') ?>

    <?php // echo $form->field($model, 'dat_hora_leitura') ?>

    <?php // echo $form->field($model, 'obsleituras') ?>

    <?php // echo $form->field($model, 'statuspgto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
