<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Empresasconv;
use yii\helpers\ArrayHelper;
use backend\models\User;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaEmpresasconv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fatura-empresasconv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // = $form->field($model, 'empresaconv_id')->textInput() ?>

    <?= $form->field($model, 'empresaconv_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Empresasconv::find()->where(['<>', 'status', 'D'])->andWhere(['parceiro_id' => 11])->all(), 'id_emrpesaconv','nomefantasia'),
        'options' => ['prompt' => 'Selecione a empresa...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'data_fechamentofat')->widget(DatePicker::classname(), [     'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
    ]); ?>

    <?= $form->field($model, 'valor_total')->widget(NumberControl::classname(), [     'maskedInputOptions' => [
        'prefix' => 'R$ ',
        //'suffix' => ' ¢',
        'groupSeparator' => '.',
        'radixPoint' => ',',
        'allowMinus' => false
    ]


    ]); ?>

     <?= $form->field($model, 'id_boletogerado')->textInput() ?>

    <?= $form->field($model, 'status_fatura')->dropDownList([ 'ABERTA' => 'ABERTA', 'FECHADA' => 'FECHADA', 'PAGA' => 'PAGA', ], ['prompt' => 'Informe...']) ?>

    <?= $form->field($model, 'datahora_abert_fatura')->widget(DatePicker::classname(), [     'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
    ]); ?>

    <?= $form->field($model, 'datapagtofat')->widget(DatePicker::classname(), [     'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
    ]);?>

    <?= $form->field($model, 'ip_cad_fatura')->hiddenInput(['maxlength' => true, 'value' => $_SERVER['REMOTE_ADDR']])->label(false) ?>

    <?= $form->field($model, 'user_cad_fatura')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
