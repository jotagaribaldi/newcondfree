<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CompracontigencSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compracontigencs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compracontigenc-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Compracontigenc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_comprascont',
            'condomino_idcont',
            'comprasrealiz_id',
            'cnpj_empresacont',
            'nfnum_cont',
            //'nfce_confirmada',
            //'urlnfcesefazcont',
            //'num_serie',
            //'modelo_nfce',
            //'anomesnfce',
            //'data_leitura_cf',
            //'codigo_chavenfce',
            //'foto_comprovcomp',
            //'user_id_confirma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
