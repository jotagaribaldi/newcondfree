<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CondominosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="condominos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_morad') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'condominio_id') ?>

    <?= $form->field($model, 'quadra_id') ?>

    <?= $form->field($model, 'imovel_id') ?>

    <?php // echo $form->field($model, 'morador_status') ?>

    <?php // echo $form->field($model, 'data_cad_cond') ?>

    <?php // echo $form->field($model, 'user_cad_id_mor') ?>

    <?php // echo $form->field($model, 'ip_cad_mor_reg') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
