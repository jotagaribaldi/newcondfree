<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaEmpresasconv */

$this->title = 'Nova Fatura Empresas Conveniadas';
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fatura-empresasconv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
