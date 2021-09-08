<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use backend\models\User;
use backend\models\Comprasrealiz;
use backend\models\Condominos;
use backend\models\Condominios;
use backend\models\Empresasconv;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComprasrealizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notas Lançadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comprasrealiz-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Lançamento Manual', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
        $gridColumns = [

           'id_compras',
            [
                'attribute'  => 'condomino_id',
                'value'     =>  function($model){ return $model['condomino']['user']['first_name'].' '.$model['condomino']['user']['last_name'];},    
                'filter'    =>  ArrayHelper::map(Condominos::find()->joinWith(['user'])->asArray()->all(), 'id_morad', 'user.first_name'),
            ],
            [
                'attribute'  => 'doc_condomino',
                'value'     => 'condomino.user.cpfcnpj',
            ],
            [
                'attribute' => 'condominio',
                'value'     => 'condomino.user.condominio.nome_condomi',
                'label'     => 'Condomínio',                
                'filter'    =>  ArrayHelper::map(Condominios::find()->where(['<>', 'id_condom', 5])->asArray()->all(), 'nome_condomi', 'nome_condomi'),
            ],
            [
                'attribute'  => 'cnpj_empresaconv',
                'value'     => 'empresasconv.nomefantasia',
                'filter'    =>  ArrayHelper::map(Empresasconv::find()->asArray()->all(), 'doc_empresa', 'nomefantasia'),
            ],
            'nfnum',
            [
                'attribute'  => 'compravalida',
            //    'value'      =>   'compravalida',
                'filter'     => ['CONF' => 'CONF', 'INV' => 'INV', 'AGUARDACONF' => 'AGUARDACONF'],
            ],    
            //'descr_servmercad',
            'data_horario',
            [
                'attribute' => 'total_pago',
                'footer'    => Yii::$app->formatter->asCurrency(Comprasrealiz::getTotalnf($dataProvider->models, 'total_pago')),
                'format'    => 'currency',
            ],
            //'urlnfsefaz',
            [
                'label'     => 'Retenção',
                'attribute' => 'valretornocashback',
            //'forma_pagto',
                'footer'    => Yii::$app->formatter->asCurrency(Comprasrealiz::getTotalcb($dataProvider->models, 'valretornocashback')),
                'format'    => 'currency',
            ],
            [
                'label'     => 'Cashback',    
                'attribute' => 'retencao',
                'value'     => function($model){ return  $model->valretornocashback * 0.9; } ,
                'footer'    => Yii::$app->formatter->asCurrency(Comprasrealiz::getTotalret($dataProvider->models, 'valretornocashback')),
                'format'    => 'currency',
            ],
            [
                'label'     => 'Comissão',    
                'attribute' => 'comissao',
                'value'     => function($model){ return  $model->valretornocashback * 0.1; } ,
                'footer'    => Yii::$app->formatter->asCurrency(Comprasrealiz::getTotalcomis($dataProvider->models, 'valretornocashback')),
                'format'    => 'currency',
            ],
            'obsleituras',
            [
                'attribute' => 'statuspgto',
                'filter'    => ['PAGO' => 'PAGO', 'PEND' => 'PEND', 'FAT' => 'FAT', 'NULO' => 'NULO'],
            ],
            'dat_hora_leitura:datetime',
           
        ];
    
    ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'exportConfig' => [
                ExportMenu::FORMAT_PDF => [
                    'pdfConfig' => [
                        'orientation' => 'L',
                        'methods' => [
                            'SetTitle' => 'Grid Export - Krajee.com',
                            'SetSubject' => 'Generating PDF files via yii2-export extension has never been easy',
                            'SetHeader' => ['Krajee Library Export||Generated On: ' . date("r")],
                            'SetFooter' => ['|Page {PAGENO}|'],
                            'SetAuthor' => 'Kartik Visweswaran',
                            'SetCreator' => 'Kartik Visweswaran',
                            'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, GridView, Grid, yii2-grid, yii2-mpdf, yii2-export',
                        ]
                    ]
                ],
            ],
            'filename' => 'exported-data_' . date('Y-m-d_H-i-s'),
    ]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'hover'=>true,
        'resizableColumns'=>true,
       // 'floatHeader'=>true,
       // 'floatHeaderOptions'=>['top'=>'50'],
        'showFooter' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_compras',
            [
                'attribute'  => 'condomino_id',
                'value'     =>  function($model){ return $model['condomino']['user']['first_name'].' '.$model['condomino']['user']['last_name'];},    
                'filter'    =>  ArrayHelper::map(Condominos::find()->joinWith(['user'])->asArray()->all(), 'id_morad', 'user.first_name'),
            ],
            [
                'attribute'  => 'doc_condomino',
                'value'     => 'condomino.user.cpfcnpj',
                'label'     => 'CPF Condômino',
            ],
            [
                'attribute' => 'condominio',
                'value'     => 'condomino.user.condominio.nome_condomi',
                'label'		=> 'Condomínio',                
                'filter'    =>  ArrayHelper::map(Condominios::find()->where(['<>', 'id_condom', 5])->asArray()->all(), 'nome_condomi', 'nome_condomi'),
            ],
            [
                'attribute'  => 'cnpj_empresaconv',
                'value'     => 'empresasconv.nomefantasia',
                'filter'    =>  ArrayHelper::map(Empresasconv::find()->asArray()->all(), 'doc_empresa', 'nomefantasia'),
            ],
            'nfnum',
            [
                'attribute'  => 'compravalida',
            //    'value'      =>   'compravalida',
                'filter'     => ['CONF' => 'CONF', 'INV' => 'INV', 'AGUARDACONF' => 'AGUARDACONF'],
            ],    
            //'descr_servmercad',
            'data_horario',
            [
            	'attribute' => 'total_pago',
            	'footer'	=> Yii::$app->formatter->asCurrency(Comprasrealiz::getTotalnf($dataProvider->models, 'total_pago')),
            	'format'	=> 'currency',
            ],
            //'urlnfsefaz',
            [
                'label'     => 'Retenção',
            	'attribute' => 'valretornocashback',
            //'forma_pagto',
            	'footer'	=> Yii::$app->formatter->asCurrency(Comprasrealiz::getTotalcb($dataProvider->models, 'valretornocashback')),
            	'format'	=> 'currency',
        	],
            [
                'label'     => 'Cashback',    
                'attribute' => 'retencao',
                'value'     => function($model){ return  $model->valretornocashback * 0.9; } ,
                'footer'    => Yii::$app->formatter->asCurrency(Comprasrealiz::getTotalret($dataProvider->models, 'valretornocashback')),
                'format'    => 'currency',
            ],
            [
                'label'     => 'Comissão',    
                'attribute' => 'comissao',
                'value'     => function($model){ return  $model->valretornocashback * 0.1; } ,
                'footer'    => Yii::$app->formatter->asCurrency(Comprasrealiz::getTotalcomis($dataProvider->models, 'valretornocashback')),
                'format'    => 'currency',
            ],
            'obsleituras',
            [
                'attribute' => 'statuspgto',
                'filter'    => ['PAGO' => 'PAGO', 'PEND' => 'PEND', 'FAT' => 'FAT', 'NULO' => 'NULO'],
            ],
            'dat_hora_leitura:datetime',
            
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
