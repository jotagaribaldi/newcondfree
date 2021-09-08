<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaEmpresasconv */

$this->title = 'Atualizar Fatura: ' . $model->idfatura;
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfatura, 'url' => ['view', 'id' => $model->idfatura]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="fatura-empresasconv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
