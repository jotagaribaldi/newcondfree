<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sindicos */

$this->title = 'Update Sindicos: ' . $model->id_sindico;
$this->params['breadcrumbs'][] = ['label' => 'Sindicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sindico, 'url' => ['view', 'id' => $model->id_sindico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sindicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
