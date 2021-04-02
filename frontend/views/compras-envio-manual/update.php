<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ComprasEnvioManual */

$this->title = 'Update Compras Envio Manual: ' . $model->id_compramanu;
$this->params['breadcrumbs'][] = ['label' => 'Compras Envio Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_compramanu, 'url' => ['view', 'id' => $model->id_compramanu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compras-envio-manual-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
