<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Condominios;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Quadrablocos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quadrablocos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'condominio_id')->dropDownList(ArrayHelper::map(Condominios::find()->where(['<>','id_condom', 5])->all(), 'id_condom','nome_condomi'), [
            'prompt' => 'Selecione o Condomínio...']) ?>

    <?= $form->field($model, 'descricao_qdblo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id_regist_qd')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false) ?>

    <?= $form->field($model, 'ip_regist_qd')->hiddenInput(['maxlength' => true, 'value' => $_SERVER['REMOTE_ADDR']])->label(false)  ?>

    <?= $form->field($model, 'datahoracad_qd')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
