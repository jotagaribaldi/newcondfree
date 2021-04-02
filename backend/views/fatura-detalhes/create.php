<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaDetalhes */

$this->title = 'Incluir compra em Fatura';
//$this->params['breadcrumbs'][] = ['label' => 'Faturas Detalhes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fatura-detalhes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
