<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Condominios;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuadrablocosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quadras - Blocos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quadrablocos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Quadra/Bloco', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id_qdblo',
            [
             'attribute'=>'condominio_id',
             'value'    =>  'condominio.nome_condomi',
              'filter'=>ArrayHelper::map(Condominios::find()->where(['<>','id_condom', 5])->asArray()->all(), 'id_condom', 'nome_condomi'),
            ],
            'descricao_qdblo',
            //'user_id_regist_qd',
            //'ip_regist_qd',
            //'datahoracad_qd',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
