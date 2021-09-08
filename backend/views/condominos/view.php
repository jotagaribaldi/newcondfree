<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Condominos */

$this->title = $model->id_morad;
$this->params['breadcrumbs'][] = ['label' => 'Condôminos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="condominos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_morad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_morad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_morad',
    	    [
               'attribute' => 'user.username',
    	       'label' => 'Login usuário',
    	    ],

    	    [
    	       'attribute' => 'user.first_name',
    	       'label' =>  'Nome',
    	    ],
    	    [
    	       'attribute' => 'user.last_name',
    		   'label'   => 'Sobrenome',
    	    ],
            [
                'attribute' => 'user.cpfcnpj',
                'label' =>  'Documento',
            ],
            [
               'attribute' => 'user.condominio.nome_condomi',
               'label'      => 'Condomínio',
            ],
            [
               'attribute' => 'user.celularfone',
               'label'      => 'Celular/Fone',
            ],
            [
               'attribute' => 'user.condominio.logo_condom',
               'label'      => 'Logomarca Condomínio',
               'format'    => ['image',['width'=>'177','height'=>'117']],
            ],
            //'condominio.nome_condomi',
            'UIDFireb',
            'morador_status',
            'data_cad_cond:datetime',
            'user_cad_id_mor',
            'ip_cad_mor_reg',
        ],
    ]) ?>

</div>
