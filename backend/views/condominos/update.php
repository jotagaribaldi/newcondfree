<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Condominos */

$this->title = 'Atualizar Condomino: ' . $model->id_morad;
$this->params['breadcrumbs'][] = ['label' => 'Condominos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_morad, 'url' => ['view', 'id' => $model->id_morad]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="condominos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
