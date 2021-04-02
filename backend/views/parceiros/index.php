<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\models\Estado;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParceirosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cadastro de Parceiros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parceiros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Parceiro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_parceiro',
	    [
            	'attribute' => 'user_id',
		'value'	   => 'user.username',
		'filter'  => ArrayHelper::map(User::find()->where(['<>', 'id', 15])->asArray()->all(), 'id', 'username') 
            ],
	    'razaosocial',
            'nomefantasia',
            'empr_adm_cond',
            //'CEP',
            //'endereco_parc',
            //'complem_parc',
            [
                'attribute' =>'municipio',
                'value'     => 'cidades.CT_NOME'
            ],
            [
                'attribute' => 'UF',
                'value'     => 'estados.UF_NOME',
  	        'filter'  => ArrayHelper::map(Estado::find()->asArray()->all(), 'UF_ID', 'UF_UF')
 
            ],
            //'num_ender_parc',
            //'bairro_parc',
            //'tipo_parc_pfpj',
            //'doc_parceiro',
            //'fonefixo_parc',
            'fonecel_parc',
            //'email_parc:email',
            //'website_parc',
            //'datahoracad_parc',
            //'ip_register_parc',
            //'user_id_register',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
