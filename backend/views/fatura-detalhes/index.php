<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaturaDetalhesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fatura Detalhes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fatura-detalhes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //= Html::a('Incluir Compra', ['create'], ['class' => 'btn btn-success']) ?>
    </p> 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_faturadetail',
            'fatura_empresaconv',
            'comprarealiz_id',
            'valor_compra',
            'valor_cashback',
            'valor_desconto_user',
            'datahoraregistro',
            //'id_user_registro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
