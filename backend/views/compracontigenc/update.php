<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Compracontigenc */

$this->title = 'Update Compracontigenc: ' . $model->id_comprascont;
$this->params['breadcrumbs'][] = ['label' => 'Compracontigencs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comprascont, 'url' => ['view', 'id' => $model->id_comprascont]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compracontigenc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
