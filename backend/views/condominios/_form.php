<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Parceiros;
use backend\models\Estado;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Condominios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="condominios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parceiro_id')->dropDownList(ArrayHelper::map(Parceiros::find()->where(['<>','id_parceiro', 6])->all(), 'id_parceiro','razaosocial'), [
            'prompt' => 'Selecione o Parceiro...']) ?>

    <?= $form->field($model, 'nome_condomi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cep')->widget(MaskedInput::className(), ['mask' => '99.999-999']) ?>

    <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_condom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compl_ender_cond')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uf_cond')->dropDownList(
            ArrayHelper::map(Estado::find()->all(), 'UF_ID','UF_NOME'),
        [
            'prompt' => 'Selecione o estado...',
                'onchange' => '
                             $.get( "'.Url::toRoute('/cidade/lists').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'cidade_cond').'" ).html( data );
            });' 
        ]

    ) ?>

     <?php
    $data = [
            "--" => "--",
     ]; ?>

    <?= $form->field($model, 'cidade_cond')->widget(Select2::classname(), [
        'data' => $data, 
        'options' => ['prompt' => 'Selecione a cidade...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'fonefixo_cond')->widget(MaskedInput::className(), ['mask' => '(99)9999-9999']) ?>

    <?= $form->field($model, 'cnpj_condom')->widget(MaskedInput::className(), ['mask' => '99.999.999/9999-99']) ?>

    <?= $form->field($model, 'nome_gerente')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'celular_gerente')->widget(MaskedInput::className(), ['mask' => '(99)99999-9999']) ?>

    <?= $form->field($model, 'statuscond')->dropDownList( ['ATIVO' => 'ATIVO', 'DESATIV' => 'DESATIVADO']) ?> 

    <?= $form->field($model, 'logo_condom')->fileInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <?= $form->field($model, 'ip_cond_cad')->hiddenInput(['maxlength' => true, 'value' => $_SERVER['REMOTE_ADDR']])->label(false) ?>

    <?= $form->field($model, 'datahoracad_cond')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'user_cad_cond')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
