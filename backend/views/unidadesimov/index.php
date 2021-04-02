<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Condominios;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnidadesimovSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidades - Imóveis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidadesimov-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Unidade', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id_imov',
            [
            'attribute' => 'condominio_id',
            'value' => 'quadraBloco.condominio.nome_condomi',
            'filter'  => ArrayHelper::map(Condominios::find()-> where(['<>', 'id_condom', 5])->asArray()->all(), 'id_condom', 'nome_condomi')
            ],
            [
           'attribute' => 'quadra_bloco_id',
           'value' => 'quadraBloco.descricao_qdblo',
            ],
            'nome_unidade',
            [
                'attribute' => 'proprietario_id',
                'value'     => //'condominoUnid.user.first_name'
                                function ($model) {
                                return $model->condominoUnid->user->first_name . ' ' . $model->condominoUnid->user->last_name;
                            }
            ],
             [
                'attribute' => 'locatario_id',
                 'format'=>'raw',
                'value'     =>  function ($model) {
                                if (!is_null($model->locatario_id)) {
                                    return $model->condominoUnidlocat->user->first_name . ' ' . $model->condominoUnidlocat->user->last_name;
                                } else {
                                    return "<span class=\"not-set\">(não definido)</span>";
                                }
                            }
            ], 
            [
	            'attribute' => 'tipo_unidade',
                'filter'    =>array('C'=>'Casa','L'=>'Lote', 'S' => 'Sala', 'A' => 'Apart', 'O' => 'Outros'),
                'value'     => function ($model) {
                                 switch($model->tipo_unidade) {
                                    case 'C':
                                        return "Casa";
                                        break;
                                    case 'L';
                                        return "Lote";
                                        break;
                                    case 'S';
                                        return "Sala";
                                        break;
                                    case 'A';
                                        return "Apart";
                                        break;
                                    case 'O';
                                        return "Outros";
                                        break;    
                                    default;
                                        return "S.D.S";
                                        break;
                                }
                            }
            ],
            //'locatario_id',
            //'data_cad_und',
            //'ip_regist_und',
            //'user_cad_und',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
