<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Comprasrealiz;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model frontend\models\ComprasEnvioManual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-envio-manual-form">

    <?php $form = ActiveForm::begin();
	$modelx = new Comprasrealiz();
        $dadosCondno = $modelx->findCondomino(Yii::$app->user->identity->id);
	print_r($modelx); die('Morreu');
    ?>

    <?= $form->field($model, 'condomino_id_manu')->textInput(['value' => $dadosCondno->id_morad]) ?>

    <?= $form->field($model, 'comprasrealiz_id_manu')->textInput() ?>

    <?= $form->field($model, 'cnpj_empresaconv_manu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nfnum_manu')->textInput() ?>

    <?php //= $form->field($model, 'compravalida_manu')->dropDownList([ 'CONF' => 'CONF', 'INV' => 'INV', 'AGUARDACONF' => 'AGUARDACONF', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'imagem_nfce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_horaenvio')->textInput() ?>

    <?= $form->field($model, 'valor_totalnota')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
