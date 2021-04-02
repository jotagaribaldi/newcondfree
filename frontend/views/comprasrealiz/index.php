<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use backend\models\Empresasconv;
use frontend\models\Comprasrealiz;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComprasrealizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compras Realizadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comprasrealiz-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ler QrCode', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_compras',
            //'condomino_id',
          /*  [
                'attribute' => 'condomino_id',
                'value'     => function($model) { return $model->condomino->user->first_name  . " " . $model->condomino->user->last_name ;},
                'filter'    => [8=>'Davi', 9 => 'Pedro', 10 => 'Sabrina'],
            ], */
            [
                'attribute' => 'nomempresa',
                'value'     =>  function($model) { 
                                    $tests = $model->getEmpresasconv($model->cnpj_empresaconv);
                                    return $tests['nomefantasia'];
                                },   
                'label'     => 'Empresa',
                'filter'    => ArrayHelper::map(Empresasconv::find()->asArray()->all(), 'doc_empresa', 'nomefantasia'),
                 
            ],
            //'cnpj_empresaconv',
            'nfnum',
            [
                'attribute' => 'compravalida',
                'label'     =>  'Status',
                'filter'    =>  ['CONF'=>'Confirmada', 'AGUARDACONF' => 'Aguardando', 'INV' => 'Invalida'],
                'value'     => function ($model) {
		                 /*   return $model->compravalida == 'CONF' ? 'Confirmada' : $model->compravalida == 'AGUARDACONF' ? 'Aguardando' : 'Invalida'; */
		                   switch($model->compravalida) {
    						case 'CONF':
					            return "CONFIRMADA";
					            break;
					        case 'AGUARDACONF';
					            return "AGUARDANDO";
					            break;
					        default;
					            return "INVÁLIDA";
					            break;
					   		}
                }
            ],
            'obsleituras',
            'data_horario',
            'dat_hora_leitura:datetime',
            'total_pago:currency',
            //'forma_pagto',
            [
            	'attribute' => 'valorcshbck' ,
            	'label' 	=> 'Cashback',
            	'format' 	=> 'currency',
            	'value' 	=> function ($model) {
            				return $model->valretornocashback * 0.9;
            	} ,	
            ],
            /*[
		         'attribute' =>'valretornocashback',
		         'footer' => Comprasrealiz::getSomaTotal($dataProvider->models, 'valretornocashback'),
	        ],*/
         
           

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php 
    	$somacash = Comprasrealiz::getSomaTotal($dataProvider->models, 'valretornocashback'); 
    	echo ('<h3 align="right">Acumulado CashBack: '.Yii::$app->formatter->asCurrency(($somacash*0.9)).'</h3>');
    	
    ?>

</div>
