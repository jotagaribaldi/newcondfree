<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Comprasrealiz */

$this->title = 'Ler Cupom Fiscal';
$this->params['breadcrumbs'][] = ['label' => 'Leituras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comprasrealiz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
