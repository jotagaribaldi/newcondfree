<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Quadrablocos */

$this->title = 'Update Quadrablocos: ' . $model->id_qdblo;
$this->params['breadcrumbs'][] = ['label' => 'Quadrablocos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_qdblo, 'url' => ['view', 'id' => $model->id_qdblo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quadrablocos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
