<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaDetalhesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fatura-detalhes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_faturadetail') ?>

    <?= $form->field($model, 'fatura_empresaconv') ?>

    <?= $form->field($model, 'comprarealiz_id') ?>

    <?= $form->field($model, 'valor_compra') ?>

    <?= $form->field($model, 'valor_cashback') ?>

    <?php // echo $form->field($model, 'valor_desconto_user') ?>

    <?php // echo $form->field($model, 'datahoraregistro') ?>

    <?php // echo $form->field($model, 'id_user_registro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
