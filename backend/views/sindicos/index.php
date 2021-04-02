<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Condominios;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\SindicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Síndico';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sindicos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Síndico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

	// 'id_sindico',
            'nome_sindico',
            [
                'attribute' => 'usersind_id',
                'value'     => 'user.username',
                'filter'=>ArrayHelper::map(User::find()->where(['<>', 'id', 15])->asArray()->all(), 'id', 'username'),
            ],
            [
                'attribute'=>'condominio_id',
                'value' => 'condominio.nome_condomi',
                'filter'=>ArrayHelper::map(Condominios::find()->where(['<>','id_condom',5])->asArray()->all(), 'id_condom', 'nome_condomi'),
            ],
            'inicio_mandato:date',
            'fim_mandato:date',
            [
            'attribute'=>'sindico_ativo',
            'filter'=>array("S"=>"Sim","N"=>"Nao"),
            'value'     => function ($model) {
                                 switch($model->sindico_ativo) {
                                    case 'S':
                                        return "Sim";
                                        break;
                                    case 'N';
                                        return "Não";
                                        break;
                                    default;
                                        return "S.D.S";
                                        break;
                                }
                            }
            ],
            [
            'attribute'=>'sindico_profi',
            'filter'=>array("S"=>"Sim","N"=>"Nao"),
            'value'     => function ($model) {
                                 switch($model->sindico_profi) {
                                    case 'S':
                                        return "Sim";
                                        break;
                                    case 'N';
                                        return "Não";
                                        break;
                                    default;
                                        return "S.D.S";
                                        break;
                                }
                            }
            ],
            'celular_sindico',
            //'sexo',
            //'data_nasci_sindico',
            //'cep_sindico',
            //'endereco_sindico',
            //'num_ender_sindico',
            //'comple_ender_sind',
            //'bairro_sindico',
            //'uf_sindi',
            //'cidade_sindico',
            //'ip_reg_sindico',
            //'user_id_cadsindico',
            //'datacad_sindico',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
