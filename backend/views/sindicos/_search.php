<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SindicosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sindicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sindico') ?>

    <?= $form->field($model, 'nome_sindico') ?>

    <?= $form->field($model, 'condominio_id') ?>

    <?= $form->field($model, 'inicio_mandato') ?>

    <?= $form->field($model, 'fim_mandato') ?>

    <?php // echo $form->field($model, 'sindico_ativo') ?>

    <?php // echo $form->field($model, 'sindico_profi') ?>

    <?php // echo $form->field($model, 'celular_sindico') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'data_nasci_sindico') ?>

    <?php // echo $form->field($model, 'cep_sindico') ?>

    <?php // echo $form->field($model, 'endereco_sindico') ?>

    <?php // echo $form->field($model, 'num_ender_sindico') ?>

    <?php // echo $form->field($model, 'comple_ender_sind') ?>

    <?php // echo $form->field($model, 'bairro_sindico') ?>

    <?php // echo $form->field($model, 'uf_sindi') ?>

    <?php // echo $form->field($model, 'cidade_sindico') ?>

    <?php // echo $form->field($model, 'ip_reg_sindico') ?>

    <?php // echo $form->field($model, 'user_id_cadsindico') ?>

    <?php // echo $form->field($model, 'datacad_sindico') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
