<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmpresasconvSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresasconv-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_emrpesaconv') ?>

    <?= $form->field($model, 'parceiro_id') ?>

    <?= $form->field($model, 'razaosocial') ?>

    <?= $form->field($model, 'nomefantasia') ?>

    <?= $form->field($model, 'segmento') ?>

    <?php // echo $form->field($model, 'percent_cash') ?>

    <?php // echo $form->field($model, 'CEP') ?>

    <?php // echo $form->field($model, 'endereco_parc') ?>

    <?php // echo $form->field($model, 'complem_parc') ?>

    <?php // echo $form->field($model, 'municipio_emp') ?>

    <?php // echo $form->field($model, 'UF_emp') ?>

    <?php // echo $form->field($model, 'num_ender_emp') ?>

    <?php // echo $form->field($model, 'bairro_emp') ?>

    <?php // echo $form->field($model, 'doc_empresa') ?>

    <?php // echo $form->field($model, 'fonefixo_emp') ?>

    <?php // echo $form->field($model, 'fonecel_emp') ?>

    <?php // echo $form->field($model, 'email_emp') ?>

    <?php // echo $form->field($model, 'link_instag') ?>

    <?php // echo $form->field($model, 'link_facebook') ?>

    <?php // echo $form->field($model, 'logo_empresa') ?>

    <?php // echo $form->field($model, 'termo_digital') ?>

    <?php // echo $form->field($model, 'datahoracad_emp') ?>

    <?php // echo $form->field($model, 'ip_register_emp') ?>

    <?php // echo $form->field($model, 'user_id_reg_emp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
