<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Condominos */

$this->title = 'Novo Condômino';
$this->params['breadcrumbs'][] = ['label' => 'Condôminos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condominos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
