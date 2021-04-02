<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Compracontigenc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compracontigenc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'condomino_idcont')->textInput() ?>

    <?= $form->field($model, 'comprasrealiz_id')->textInput() ?>

    <?= $form->field($model, 'cnpj_empresacont')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nfnum_cont')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nfce_confirmada')->dropDownList([ 'CONF' => 'CONF', 'INV' => 'INV', 'AGUARDACONF' => 'AGUARDACONF', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'urlnfcesefazcont')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modelo_nfce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anomesnfce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_leitura_cf')->textInput() ?>

    <?= $form->field($model, 'codigo_chavenfce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_comprovcomp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id_confirma')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
