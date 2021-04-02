<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Parceiros;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmpresasconvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas Conveniadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresasconv-index">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           //'id_emrpesaconv',
           // 'parceiro_id',
          /*  [
                'attribute' => 'parceiro_id',
                'value'     => 'parceiro.nomefantasia',
                'filter'=>ArrayHelper::map(Parceiros::find()->asArray()->all(), 'id_parceiro', 'nomefantasia'),
            ], */
            'razaosocial',
            'nomefantasia',
            'doc_empresa',
            'segmento',
            [
                'attribute'=>'percent_cash',
                'value' => function ($data) { return $data->percent_cash * 100 . "%"; },
            ],
            //'CEP',
            //'endereco_parc',
            //'complem_parc',
            [
                'attribute' => 'municipio_emp',
                'value'     => 'cidades.CT_NOME',
            ],
            [
                'attribute' =>  'UF_emp',
                'value'     =>  'estados.UF_UF',
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) { return $data->status == 'A' ? 'Ativa' : 'Desativada'; },
                'filter' => ['A' => 'Ativa', 'D' => 'Desativada'],
            ],
            //'num_ender_emp',
            //'bairro_emp',
            //'doc_empresa',
            //'fonefixo_emp',
            //'fonecel_emp',
            //'email_emp:email',
            //'link_instag',
            //'link_facebook',
            //'logo_empresa',
            //'termo_digital',
            //'datahoracad_emp',
            //'ip_register_emp',
            //'user_id_reg_emp',

           /* ['class' => 'yii\grid\ActionColumn'],*/
        ],
    ]); ?>


</div>
