<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Condominios;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CondominosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Condôminos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="condominos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Condômino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

              //  'id_morad',
      	       [
             		'attribute' =>   'user_id',
    		      	'value'    => 'user.username',
    		     	'filter'  => ArrayHelper::map(User::find()->where(['<>', 'id', 15])->asArray()->all(), 'id', 'username') 

    	       ],
    	       [
    				'attribute' => 'first_name',
    	       		'value'   => 'user.first_name',
    	       		'label' => 'Nome',
	   	       ],
	   	         [
    				'attribute' => 'last_name',
    	       		'value'   => 'user.last_name',
    	       		'label' => 'Sobrenome',
	   	       ],
	   	        [
    				'attribute' => 'celularfone',
    	       		'value'   => 'user.celularfone',
    	       		'label' => 'Celular',
	   	       ],
	   	        [
    				'attribute' => 'cpfcnpj',
    	       		'value'   => 'user.cpfcnpj',
    	       		'label' => 'Documento',
	   	       ],
    	       [
              	   'attribute' => 'condominio_id',
    		    	     'value'   => 'user.condominio.nome_condomi',
                	 'label' => 'Condomínio',
    		    	     'filter'  => ArrayHelper::map(Condominios::find()-> where(['<>', 'id_condom', 5])->asArray()->all(), 'id_condom', 'nome_condomi')
    	       ], 
              //  'quadra_id', 
              //  'imovel_id',
    	       [
                	'attribute' => 'morador_status',
    		          'filter'	=>array('ATIVO'=>'Ativo','INATIVO'=>'Inativo'),
                  'value'     => function ($model) {
                                 switch($model->morador_status) {
                                    case 'ATIVO':
                                        return "Ativo";
                                        break;
                                    case 'INATIVO';
                                        return "Inativo";
                                        break;
                                    default;
                                        return "S.D.S";
                                        break;
                                }
                            }
              ],
    	      [
              		'attribute' => 'titu_depend',
              		'filter' 	=>  array('TIT'=>'Titular','DEP'=>'Dependente'),
                  'value'     => function ($model) {
                                 switch($model->titu_depend) {
                                    case 'TIT':
                                        return "Titular";
                                        break;
                                    case 'DEP';
                                        return "Dependente";
                                        break;
                                    default;
                                        return "S.D.S";
                                        break;
                                }
                            }
              	],
    	        [
    	        	  'filter'     =>	array('CONF'=>'Confirmado','DEP-AUT'=>'Pendente'),
                  'format'=>'raw',
              		'attribute'  =>'confirmado',
                   'value'     => function ($model) {
                                 switch($model->confirmado) {
                                    case 'CONF':
                                        return "Confirmado";
                                        break;
                                    case 'DEP-AUT';
                                        return "<span class=\"not-set\">(pendente)</span>";
                                        break;
                                    default;
                                        return "S.D.S";
                                        break;
                                }
                            }
              	],
                'UIDFireb',
            //'user_cad_id_mor',
            //'ip_cad_mor_reg',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
