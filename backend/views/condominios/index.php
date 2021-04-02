<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Parceiros;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CondominiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Condomínios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condominios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Condomínio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id_condom',
            [
                'attribute' => 'parceiro_id',
                'value'     => 'parceiro.razaosocial',
                'filter'=>ArrayHelper::map(Parceiros::find()->asArray()->all(), 'id_parceiro', 'razaosocial')
            ],
            'nome_condomi',
            //'cep',
            // 'endereco',
            //'num_condom',
            //'compl_ender_cond',
            [
                'attribute' => 'cidade_cond',
                'value'     => 'cidades.CT_NOME'
            ],
            [
                'attribute' => 'uf_cond',
                'value'     => 'estados.UF_UF'   
            ],
            //'fonefixo_cond',
            'celular_gerente',
            //'cnpj_condom',
            'nome_gerente',
            [
                'attribute' => 'statuscond',
                'filter' => ['ATIVO' => 'Elementary', 'DESATIV' => 'Secondary'],
            ],
            //'ip_cond_cad',
            //'datahoracad_cond',
            //'user_cad_cond',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
