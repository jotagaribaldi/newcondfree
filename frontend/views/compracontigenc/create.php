<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Compracontigenc */

$this->title = 'Create Compracontigenc';
$this->params['breadcrumbs'][] = ['label' => 'Compracontigencs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compracontigenc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
