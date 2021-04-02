<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use backend\models\Condominios;
use backend\models\Estado;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Sindicos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sindicos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'condominio_id')->dropDownList(ArrayHelper::map(Condominios::find()->where(['!=','id_condom', 5])->all(), 'id_condom','nome_condomi'), [
            'prompt' => 'Selecione o Condomínio...']) ?>

    <?= $form->field($model, 'nome_sindico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usersind_id')->dropDownList(ArrayHelper::map(User::find()->where(['<>', 'id', 5])->all(), 'id','username'),   [
            'prompt' => 'Selecione o login de usuário...',])  ?>

    <?= $form->field($model, 'inicio_mandato')->widget(DatePicker::classname(),['pluginOptions' => [
        'orientation' => 'top left',
        'format' => 'dd/mm/yyyy',
        'autoclose' => true,
    ],]) ?>

    <?= $form->field($model, 'fim_mandato')->widget(DatePicker::classname(),['pluginOptions' => [
        'orientation' => 'top left',
        'format' => 'dd/mm/yyyy',
        'autoclose' => true,
    ],]) ?>

    <?= $form->field($model, 'sindico_ativo')->dropDownList([ 'N' => 'Não', 'S' => 'Sim', ], ['prompt' => 'Selecione ...']) ?>

    <?= $form->field($model, 'sindico_profi')->dropDownList([ 'S' => 'Sim', 'N' => 'Não', ], ['prompt' => 'Selecione ...']) ?>

    <?= $form->field($model, 'celular_sindico')->widget(MaskedInput::className(), ['mask' => '(99)99999-9999']) ?>

    <?= $form->field($model, 'sexo')->dropDownList([ 'M' => 'Masculino', 'F' => 'Feminino', ], ['prompt' => 'Informe ...']) ?>

    <?= $form->field($model, 'data_nasci_sindico')->widget(DatePicker::classname(),['pluginOptions' => [
        'orientation' => 'top left',
        'format' => 'dd/mm/yyyy',
        'autoclose' => true,
    ],])  ?>

    <?= $form->field($model, 'cep_sindico')->widget(MaskedInput::className(), ['mask' => '99.999-999']) ?>

    <?= $form->field($model, 'endereco_sindico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_ender_sindico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comple_ender_sind')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bairro_sindico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uf_sindi')->dropDownList(
            ArrayHelper::map(Estado::find()->all(), 'UF_ID','UF_NOME'),
        [
            'prompt' => 'Selecione o estado...',
                'onchange' => '
                             $.get( "'.Url::toRoute('/cidade/lists').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'cidade_sindico').'" ).html( data );
            });' 
        ]

    ) ?>

     <?php
    $data = [
            "--" => "--",
     ]; ?>

    <?= $form->field($model, 'cidade_sindico')->widget(Select2::classname(), [
        'data' => $data, 
        'options' => ['prompt' => 'Selecione a cidade...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'ip_reg_sindico')->hiddenInput(['maxlength' => true, 'value' => $_SERVER['REMOTE_ADDR']])->label(false) ?>

    <?= $form->field($model, 'user_id_cadsindico')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false) ?>

    <?= $form->field($model, 'datacad_sindico')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
