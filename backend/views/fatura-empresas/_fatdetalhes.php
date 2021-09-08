<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaturaDetalhesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/*$this->title = 'Fatura Detalhes';
$this->params['breadcrumbs'][] = $this->title; */
?>
<div class="fatura-detalhes-index">

  
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id_faturadetail',
            //'fatura_empresaconv',
            'comprarealiz_id',
            'comprarealiz.nfnum',
            'comprarealiz.total_pago:currency',
            'comprarealiz.valretornocashback:currency',
            'comprarealiz.statuspgto',
            
            'datahoraregistro:datetime',
            //'id_user_registro',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
