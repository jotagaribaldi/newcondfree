<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Condominos;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use backend\models\User;
use kartik\select2\Select2;
use kartik\number\NumberControl;


/* @var $this yii\web\View */
/* @var $model backend\models\Comprasrealiz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comprasrealiz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'condomino_id')->textInput() ?>

     <?php
   // $tes = Condominos::find()->with('user')->where(['<>', 'id_morad', 8])->andWhere(['morador_status' => 'ATIVO'])->andWhere(['confirmado' => 'CONF'])->all(); // print_r($tes); ?>

    <?= $form->field($model, 'condomino_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Condominos::find()->with('user')->where(['<>', 'id_morad', 8])->andWhere(['morador_status' => 'ATIVO'])->andWhere(['confirmado' => 'CONF'])->all(), 'id_morad', function($model){ return $model->user['first_name'].' '.$model->user['last_name'].' - '. $model->user['condominio_id'];}),
         //'user.first_name'),
        'options' => ['prompt' => 'Selecione o Condômino...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'cnpj_empresaconv')->widget(MaskedInput::className(), ['mask' => '99.999.999/9999-99']) ?>

    <?= $form->field($model, 'nfnum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compravalida')->dropDownList([ 'CONF' => 'CONFIRMADA', 'INV' => 'INVÁLIDA', 'AGUARDACONF' => 'AGUARDA CONFIRMACAO', ], ['prompt' => 'Informe...']) ?>

    <?php //= $form->field($model, 'descr_servmercad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_horario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_pago')->widget(NumberControl::classname(), [     'maskedInputOptions' => [
        'prefix' => 'R$ ',
        //'suffix' => ' ¢',
        'groupSeparator' => '.',
        'radixPoint' => ',',
        'allowMinus' => false
    ]


    ]); ?>

    <?= $form->field($model, 'urlnfsefaz')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'valretornocashback')->textInput() ?>

    <?php //= $form->field($model, 'forma_pagto')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'dat_hora_leitura')->textInput() ?>

    <?= $form->field($model, 'obsleituras')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'statuspgto')->dropDownList([ 'PAGO' => 'PAGO', 'PEND' => 'PEND', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
