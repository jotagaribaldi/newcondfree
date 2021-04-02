<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CompracontigencSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compracontigenc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_comprascont') ?>

    <?= $form->field($model, 'condomino_idcont') ?>

    <?= $form->field($model, 'comprasrealiz_id') ?>

    <?= $form->field($model, 'cnpj_empresacont') ?>

    <?= $form->field($model, 'nfnum_cont') ?>

    <?php // echo $form->field($model, 'nfce_confirmada') ?>

    <?php // echo $form->field($model, 'urlnfcesefazcont') ?>

    <?php // echo $form->field($model, 'num_serie') ?>

    <?php // echo $form->field($model, 'modelo_nfce') ?>

    <?php // echo $form->field($model, 'anomesnfce') ?>

    <?php // echo $form->field($model, 'data_leitura_cf') ?>

    <?php // echo $form->field($model, 'codigo_chavenfce') ?>

    <?php // echo $form->field($model, 'foto_comprovcomp') ?>

    <?php // echo $form->field($model, 'user_id_confirma') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
