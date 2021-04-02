<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaEmpresasconvSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fatura-empresasconv-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idfatura') ?>

    <?= $form->field($model, 'empresaconv_id') ?>

    <?= $form->field($model, 'data_fechamentofat') ?>

    <?= $form->field($model, 'valor_total') ?>

    <?= $form->field($model, 'status_fatura') ?>

    <?php // echo $form->field($model, 'datahora_abert_fatura') ?>

    <?php // echo $form->field($model, 'datapagtofat') ?>

    <?php // echo $form->field($model, 'ip_cad_fatura') ?>

    <?php // echo $form->field($model, 'user_cad_fatura') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
