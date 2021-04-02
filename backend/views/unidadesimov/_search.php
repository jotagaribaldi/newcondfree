<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnidadesimovSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidadesimov-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_imov') ?>

    <?= $form->field($model, 'condominio_id') ?>

    <?= $form->field($model, 'quadra_bloco_id') ?>

    <?= $form->field($model, 'nome_unidade') ?>

    <?= $form->field($model, 'proprietario_id') ?>

    <?php // echo $form->field($model, 'locatario_id') ?>

    <?php // echo $form->field($model, 'data_cad_und') ?>

    <?php // echo $form->field($model, 'ip_regist_und') ?>

    <?php // echo $form->field($model, 'user_cad_und') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
