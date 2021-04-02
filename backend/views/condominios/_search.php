<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CondominiosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="condominios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_condom') ?>

    <?= $form->field($model, 'parceiro_id') ?>

    <?= $form->field($model, 'nome_condomi') ?>

    <?= $form->field($model, 'cep') ?>

    <?= $form->field($model, 'endereco') ?>

    <?php // echo $form->field($model, 'num_condom') ?>

    <?php // echo $form->field($model, 'compl_ender_cond') ?>

    <?php // echo $form->field($model, 'cidade_cond') ?>

    <?php // echo $form->field($model, 'uf_cond') ?>

    <?php // echo $form->field($model, 'fonefixo_cond') ?>

    <?php // echo $form->field($model, 'celular_gerente') ?>

    <?php // echo $form->field($model, 'cnpj_condom') ?>

    <?php // echo $form->field($model, 'nome_gerente') ?>

    <?php // echo $form->field($model, 'ip_cond_cad') ?>

    <?php // echo $form->field($model, 'datahoracad_cond') ?>

    <?php // echo $form->field($model, 'user_cad_cond') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
