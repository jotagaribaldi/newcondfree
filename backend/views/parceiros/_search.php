<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ParceirosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parceiros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_parceiro') ?>

    <?= $form->field($model, 'razaosocial') ?>

    <?= $form->field($model, 'nomefantasia') ?>

    <?= $form->field($model, 'empr_adm_cond') ?>

    <?= $form->field($model, 'CEP') ?>

    <?php // echo $form->field($model, 'endereco_parc') ?>

    <?php // echo $form->field($model, 'complem_parc') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'UF') ?>

    <?php // echo $form->field($model, 'num_ender_parc') ?>

    <?php // echo $form->field($model, 'bairro_parc') ?>

    <?php // echo $form->field($model, 'tipo_parc_pfpj') ?>

    <?php // echo $form->field($model, 'doc_parceiro') ?>

    <?php // echo $form->field($model, 'fonefixo_parc') ?>

    <?php // echo $form->field($model, 'fonecel_parc') ?>

    <?php // echo $form->field($model, 'email_parc') ?>

    <?php // echo $form->field($model, 'website_parc') ?>

    <?php // echo $form->field($model, 'datahoracad_parc') ?>

    <?php // echo $form->field($model, 'ip_register_parc') ?>

    <?php // echo $form->field($model, 'user_id_register') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
