<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ComprasEnvioManualSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-envio-manual-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_compramanu') ?>

    <?= $form->field($model, 'condomino_id_manu') ?>

    <?= $form->field($model, 'comprasrealiz_id_manu') ?>

    <?= $form->field($model, 'cnpj_empresaconv_manu') ?>

    <?= $form->field($model, 'nfnum_manu') ?>

    <?php // echo $form->field($model, 'compravalida_manu') ?>

    <?php // echo $form->field($model, 'imagem_nfce') ?>

    <?php // echo $form->field($model, 'data_horaenvio') ?>

    <?php // echo $form->field($model, 'valor_totalnota') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
