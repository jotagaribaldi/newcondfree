<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Condominios;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Unidadesimov */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidadesimov-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'condominio_id')->dropDownList(ArrayHelper::map(Condominios::find()->where(['<>','id_condom', 5])->all(), 'id_condom','nome_condomi'),   [
            'prompt' => 'Selecione o Condominio...',
                'onchange' => '
                             $.get( "'.Url::toRoute('/quadrablocos/lists').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'quadra_bloco_id').'" ).html( data );
            });
                             $.get( "'.Url::toRoute('/unidadesimov/lists').'", { id: $(this).val() } )
                            .done(function( datap ) {
                                $( "#'.Html::getInputId($model, 'proprietario_id').'" ).html( datap );
            });
                             $.get( "'.Url::toRoute('/unidadesimov/listsloc').'", { id: $(this).val() } )
                            .done(function( datalo ) {
                                $( "#'.Html::getInputId($model, 'locatario_id').'" ).html( datalo );
            });' 
            
        ]) ?>


    <?php
    $data = [
            "--" => "--",
     ]; ?>

    <?= $form->field($model, 'quadra_bloco_id')->widget(Select2::classname(), [
        'data' => $data, 
        'options' => ['prompt' => 'Selecione a quadra...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);  ?>

    <?= $form->field($model, 'nome_unidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_unidade')->dropDownList( ['L' => 'Lote', 'C' => 'Casa', 'S' => 'Sala', 'A' => 'Apartamento', 'O' => 'Outros'], ['prompt' => 'Selecione ...']) ?>

    <?php
    $datap = [
            "---" => "---",
     ]; ?>

    <?= $form->field($model, 'proprietario_id')->widget(Select2::classname(), [
        'data' => $datap, 
        'options' => ['prompt' => 'Selecione o Proprietario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);  ?>

    <?php
    $datalo = [
            "----" => "----",
     ]; ?>

    <?= $form->field($model, 'locatario_id')->widget(Select2::classname(), [
        'data' => $datalo, 
        'options' => ['prompt' => 'Selecione o Locatario...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'data_cad_und')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'ip_regist_und')->hiddenInput(['maxlength' => true, 'value' => $_SERVER['REMOTE_ADDR']])->label(false)   ?>

    <?= $form->field($model, 'user_cad_und')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
