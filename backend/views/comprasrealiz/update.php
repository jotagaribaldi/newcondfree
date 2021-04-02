<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Comprasrealiz */

$this->title = 'Update Comprasrealiz: ' . $model->id_compras;
$this->params['breadcrumbs'][] = ['label' => 'Comprasrealizs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_compras, 'url' => ['view', 'id' => $model->id_compras]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comprasrealiz-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
