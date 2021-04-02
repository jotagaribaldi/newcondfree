<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaEmpresasconv */

$this->title = 'Update Fatura Empresasconv: ' . $model->idfatura;
$this->params['breadcrumbs'][] = ['label' => 'Fatura Empresasconvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfatura, 'url' => ['view', 'id' => $model->idfatura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fatura-empresasconv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
