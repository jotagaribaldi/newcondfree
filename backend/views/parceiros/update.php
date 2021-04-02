<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Parceiros */

$this->title = 'Update Parceiros: ' . $model->id_parceiro;
$this->params['breadcrumbs'][] = ['label' => 'Parceiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_parceiro, 'url' => ['view', 'id' => $model->id_parceiro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parceiros-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
