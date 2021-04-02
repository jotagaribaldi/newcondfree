<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use backend\models\Estado;
use backend\models\Cidade;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Parceiros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parceiros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->where(['<>', 'id', 5])->all(), 'id','username'),   [
            'prompt' => 'Selecione o login de usuário...',]) ?>

    <?= $form->field($model, 'razaosocial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomefantasia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'empr_adm_cond')->dropDownList([ 'S' => 'Sim', 'N' => 'Nao', ], ['prompt' => 'Informe ...']) ?>

    <?= $form->field($model, 'CEP')->widget(MaskedInput::className(), ['mask' => '99.999-999']) ?>

    <?= $form->field($model, 'endereco_parc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_ender_parc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complem_parc')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'UF')->dropDownList(
            ArrayHelper::map(Estado::find()->all(), 'UF_ID','UF_NOME'),
        [
            'prompt' => 'Selecione o estado...',
                'onchange' => '
                             $.get( "'.Url::toRoute('/cidade/lists').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'municipio').'" ).html( data );
            });' 
        ]

    ) ?>

    <?php /*= $form->field($model, 'UF')->dropDownList(Estado::getEstados(), ['prompt' => 'Informe...', 'id' => 'UF_ID', 'name' => 'UF_UF'], 	[
			'prompt' => 'Selecione o estado...',
				'onchange' => '
                             $.get( "'.Url::toRoute('/backend/cidade/lists').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'municipio').'" ).html( data );
			});' 
		]) */ ?>

    <?php
	$data = [
    		"--" => "--",
     ]; ?>

    <?= $form->field($model, 'municipio')->widget(Select2::classname(), [
	    'data' => $data, 
	    'options' => ['prompt' => 'Selecione a cidade...'],
	    'pluginOptions' => [
	        'allowClear' => true
	    ],
	]);  ?>


    

    <?= $form->field($model, 'bairro_parc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_parc_pfpj')->dropDownList([ 'PF' => 'Pessoa Física', 'PJ' => 'Pessoa Jurídica', ], ['prompt' => 'Informe...']) ?>

    <?= $form->field($model, 'doc_parceiro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fonefixo_parc')->widget(MaskedInput::className(), ['mask' => '(99)9999-9999'])?>

    <?= $form->field($model, 'fonecel_parc')->widget(MaskedInput::className(), ['mask' => '(99)99999-9999']) ?>

    <?= $form->field($model, 'email_parc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website_parc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datahoracad_parc')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'ip_register_parc')->hiddenInput(['maxlength' => true, 'value' => $_SERVER['REMOTE_ADDR']])->label(false) ?>

    <?= $form->field($model, 'user_id_register')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
