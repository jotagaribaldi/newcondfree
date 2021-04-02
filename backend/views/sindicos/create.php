<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sindicos */

$this->title = 'Novo Sindico';
$this->params['breadcrumbs'][] = ['label' => 'Síndicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sindicos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
