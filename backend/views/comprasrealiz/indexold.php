<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComprasrealizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comprasrealizs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comprasrealiz-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comprasrealiz', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_compras',
            'condomino_id',
            'cnpj_empresaconv',
            'local_compra',
            'descr_servmercad',
            //'data_horario',
            //'total_pago',
            //'forma_pagto',
            //'dat_hora_leitura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
