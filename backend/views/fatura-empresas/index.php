<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Empresasconv;
use backend\models\FaturaDetalhes;
use backend\models\FaturaDetalhesSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaturaEmpresasconvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fatura-empresasconv-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Fatura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
        	  ['class' => 'kartik\grid\ExpandRowColumn',
        	  	'value' => function ($model, $key, $index, $column) {
        	  		return GridView::ROW_COLLAPSED;
        	  	},
        	  	'detail'	=> function($model, $key, $index, $column) {
        	  		$searchModel = new FaturaDetalhesSearch();
        	  		$searchModel->fatura_empresaconv =  $model->idfatura;
        	  		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        	  		return Yii::$app->controller->renderPartial('_fatdetalhes',  [
        	  			'searchModel' => $searchModel,
        	  			'dataProvider' => $dataProvider,
        	  		]);
        	  	},

        	  ],

            'idfatura',
            [
                'attribute' => 'empresaconv_id',
                'value'     => 'empresaconv.nomefantasia',
                'filter'    => ArrayHelper::map(Empresasconv::find()->where(['<>', 'status', 'D'])->andWhere(['parceiro_id' => 11])->all(), 'id_emrpesaconv','nomefantasia')
            ],
            'data_fechamentofat:date',
            'valor_total:currency',
            'id_boletogerado',
            [
                'attribute'  => 'status_fatura',
                'filter'     => [ 'ABERTA' => 'ABERTA', 'FECHADA' => 'FECHADA', 'PAGA' => 'PAGA', ],
            ],
            'datahora_abert_fatura:date',
            'datapagtofat:date',
            //'ip_cad_fatura',
            //'user_cad_fatura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
