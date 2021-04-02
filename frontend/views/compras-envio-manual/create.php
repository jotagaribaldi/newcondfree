<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ComprasEnvioManual */

$this->title = 'Create Compras Envio Manual';
$this->params['breadcrumbs'][] = ['label' => 'Compras Envio Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compras-envio-manual-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
