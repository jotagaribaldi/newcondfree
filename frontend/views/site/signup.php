<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use frontend\models\Condominios;
$this->title = 'Cadastre-se!';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor preencha os campos abaixo com seus dados pessoais para se cadastrar:</p>
<?php

	$cond = new Condominios();

?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Login') ?>

		<?= $form->field($model, 'first_name')->label('Primeiro Nome') ?>

		<?= $form->field($model, 'last_name')->label('Sobrenome') ?>

		<?= $form->field($model, 'condominio_id')->dropDownList(ArrayHelper::map(Condominios::find()->where(['statuscond' => 'ATIVO'])->all(),'id_condom','nome_condomi'),['prompt'=>'Informe o seu condomíno']) ->label('Condominio') ?>
	
		<?= $form->field($model, 'celularfone')->widget(MaskedInput::className(), ['mask' => '(99)99999-9999'])->label('Celular') ?>

		<?= $form->field($model, 'cpfcnpj')->widget(MaskedInput::className(), ['mask' => '999.999.999-99'])->label('CPF') ?>
           
		<?= $form->field($model, 'email')->label('E-mail') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Senha') ?>

                <div class="form-group">
                    <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
