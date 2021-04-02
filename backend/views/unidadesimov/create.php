<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Unidadesimov */

$this->title = 'Novo Imóvel';
$this->params['breadcrumbs'][] = ['label' => 'Unidades - Imóveis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidadesimov-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
