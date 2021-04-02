<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Condominios;
use backend\models\Condominos;
use yii\helpers\ArrayHelper;
use backend\models\User;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\Condominos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="condominos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->where(['<>', 'id', 5])->all(), 'id','username'),   [ 'prompt' => 'Selecione o login de usuário...',])  ?>
    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(User::find()->where(['<>', 'id', 5])->andWhere(['not exists', Condominos::find()->select('user_id')->from('condominos')->where('condominos.user_id = user.id')])->all(), 'id',function($model){ return $model->first_name.' '.$model->last_name;}),
        'options' => ['prompt' => 'Selecione o condomino...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php //= $form->field($model, 'condominio_id')->dropDownList(ArrayHelper::map(Condominios::find()->all(), 'id_condom','nome_condomi'), ['prompt' => 'Selecione o Condominio...',]) ?>

    <?= $form->field($model, 'morador_status')->dropDownList([ 'ATIVO' => 'ATIVO', 'INATIVO' => 'INATIVO', ], ['prompt' => 'Informe...']) ?>

    <?= $form->field($model, 'titu_depend')->dropDownList([ 'TIT' => 'Titular', 'DEP' => 'Dependente', ], ['prompt' => 'Informe...']) ?>

    <?= $form->field($model, 'confirmado')->dropDownList([ 'CONF' => 'Confirmado', 'DEP-AUT' => 'Confirmação Pendente', ], ['prompt' => 'Informe...']) ?>

    <?= $form->field($model, 'UIDFireb')->textInput() ?>

    <?= $form->field($model, 'user_cad_id_mor')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false) ?>

    <?= $form->field($model, 'ip_cad_mor_reg')->hiddenInput(['maxlength' => true, 'value' => $_SERVER['REMOTE_ADDR']])->label(false)  ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
