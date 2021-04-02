<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Comprasrealiz */

$this->title = $model->id_compras;
$this->params['breadcrumbs'][] = ['label' => 'Notas Fiscais Lidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comprasrealiz-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_compras], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_compras], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_compras',
            'condomino_id',
            [
                'attribute' => 'condomino.user.first_name',
                'label'     => 'Nome Condômino',
            ],
            [
                'attribute' => 'condomino.user.last_name',
                'label'     => 'Sobrenome',
            ],
            'cnpj_empresaconv',
            'empresasconv.nomefantasia',
            'nfnum',
            'compravalida',
            'descr_servmercad',
            'data_horario',
            'total_pago:currency',
            'urlnfsefaz:url',
            'valretornocashback:currency',
            'forma_pagto',
            'dat_hora_leitura:datetime',
            'obsleituras',
            'statuspgto',
        ],
    ]) ?>

</div>
