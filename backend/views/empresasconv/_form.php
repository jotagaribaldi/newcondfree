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
use backend\models\Parceiros;
/* @var $this yii\web\View */
/* @var $model backend\models\Empresasconv */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
if (isset(Yii::$app->user->identity->id)) {
    $objparc = Parceiros::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
   
}
if (is_null($objparc)){
    die('Nenhhum parceiro cadastrado ainda. Clique em voltar e cadastre Parceiro');
}
?>

<div class="empresasconv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parceiro_id')->hiddenInput(['value' => $objparc->id_parceiro])->label(false)  ?>

    <?= $form->field($model, 'razaosocial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomefantasia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segmento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'percent_cash')->textInput() ?>

    <?= $form->field($model, 'CEP')->widget(MaskedInput::className(), ['mask' => '99.999-999'])  ?>

    <?= $form->field($model, 'endereco_parc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complem_parc')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'UF_emp')->dropDownList(
            ArrayHelper::map(Estado::find()->all(), 'UF_ID','UF_NOME'),
        [
            'prompt' => 'Selecione o estado...',
                'onchange' => '
                             $.get( "'.Url::toRoute('/cidade/lists').'", { id: $(this).val() } )
                            .done(function( data ) {
                                $( "#'.Html::getInputId($model, 'municipio_emp').'" ).html( data );
            });' 
        ]

    ) ?>

     <?php
    $data = [
            "--" => "--",
     ]; ?>


     <?= $form->field($model, 'municipio_emp')->widget(Select2::classname(), [
        'data' => $data, 
        'options' => ['prompt' => 'Selecione a cidade...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'num_ender_emp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bairro_emp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_empresa')->widget(MaskedInput::className(), ['mask' => '99.999.999/9999-99']) ?>

    <?= $form->field($model, 'fonefixo_emp')->widget(MaskedInput::className(), ['mask' => '(99)9999-9999']) ?>

    <?= $form->field($model, 'fonecel_emp')->widget(MaskedInput::className(), ['mask' => '(99)99999-9999'])?>

    <?= $form->field($model, 'email_emp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_instag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo_empresa')->fileInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <?= $form->field($model, 'termo_digital')->fileInput(['maxlength' => true, 'class' => 'form-control']) ?>

    <?= $form->field($model, 'datahoracad_emp')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'ip_register_emp')->hiddenInput(['maxlength' => true, 'value' => $_SERVER['REMOTE_ADDR']])->label(false)  ?>

    <?= $form->field($model, 'user_id_reg_emp')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
