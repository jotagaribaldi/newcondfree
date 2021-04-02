<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\QuadrablocosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quadrablocos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_qdblo') ?>

    <?= $form->field($model, 'condominio_id') ?>

    <?= $form->field($model, 'descricao_qdblo') ?>

    <?= $form->field($model, 'user_id_regist_qd') ?>

    <?= $form->field($model, 'ip_regist_qd') ?>

    <?php // echo $form->field($model, 'datahoracad_qd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
