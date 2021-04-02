<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresasconv */

$this->title = 'Nova Empresa Conveniada';
$this->params['breadcrumbs'][] = ['label' => 'Empresas Conveniadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresasconv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
