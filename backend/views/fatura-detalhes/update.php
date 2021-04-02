<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaDetalhes */

$this->title = 'Update Fatura Detalhes: ' . $model->id_faturadetail;
$this->params['breadcrumbs'][] = ['label' => 'Fatura Detalhes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_faturadetail, 'url' => ['view', 'id' => $model->id_faturadetail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fatura-detalhes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
