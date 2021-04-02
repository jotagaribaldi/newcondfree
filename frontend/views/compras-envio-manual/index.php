<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ComprasEnvioManualSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enviar nota de compra';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compras-envio-manual-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Enviar Nota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id_compramanu',
            'condomino_id_manu',
            'comprasrealiz_id_manu',
            'cnpj_empresaconv_manu',
            'nfnum_manu',
            //'compravalida_manu',
            //'imagem_nfce',
            //'data_horaenvio',
             'valor_totalnota',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
