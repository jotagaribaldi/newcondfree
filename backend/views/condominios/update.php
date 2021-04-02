<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Condominios */

$this->title = 'Atualizar Condominio: ' . $model->id_condom;
$this->params['breadcrumbs'][] = ['label' => 'Condominios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_condom, 'url' => ['view', 'id' => $model->id_condom]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="condominios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
