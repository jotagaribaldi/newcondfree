<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Condominios */

$this->title = 'Novo Condomínio';
$this->params['breadcrumbs'][] = ['label' => 'Condomínio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condominios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
