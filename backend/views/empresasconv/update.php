<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresasconv */

$this->title = 'Atualizar Empresa: ' . $model->id_emrpesaconv;
$this->params['breadcrumbs'][] = ['label' => 'Empresas parceiras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_emrpesaconv, 'url' => ['view', 'id' => $model->id_emrpesaconv]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="empresasconv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
