<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Preencha os campos abaixo com seus dados para realizar login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Login') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Senha') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Lembrar meus dados') ?>

                <div style="color:#999;margin:1em 0">
                    Esqueceu a senha? <?= Html::a('reset senha', ['site/request-password-reset']) ?>.
                    <br>
                    Email de verificação não chegou? <?= Html::a('reenviar', ['site/resend-verification-email']) ?>
                    <br>
                    Ainda não tem cadastro?  <?= Html::a('Cadastre-se' , ['site/signup']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>