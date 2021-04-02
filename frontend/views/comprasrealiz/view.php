<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\Comprasrealiz */

$this->title = $model->id_compras;
//$this->params['breadcrumbs'][] = ['label' => 'Leituras Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comprasrealiz-view">

    <h1>Leitura realizada: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Início', ['site/index'], ['class' => 'btn btn-primary']) ?>
        <?php // as= Html::a('Atualizar', ['update', 'id' => $model->id_compras], ['class' => 'btn btn-primary']) ?>
        <?php /*= Html::a('Excluir', ['delete', 'id' => $model->id_compras], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_compras',
          //  'condomino_id',
            [
                'label' => 'Condômino',
                'attribute' => function($model) { return $model->condomino->user->first_name  . " " . $model->condomino->user->last_name ;}, 
            ],
            'cnpj_empresaconv',
            [
            	    'label' => 'Nome Empresa',
            	    'attribute' => function($model) { 
	                                    $tests = $model->getEmpresasconv($model->cnpj_empresaconv);
                                        //var_dump($tests); die('Parei');
	                                    return $tests['nomefantasia'];
                                	}, 
            ],
            'nfnum',
            'descr_servmercad',
           // 'total_pago:currency',
            [
                'label' => 'Status Compra',
                'attribute'     => function ($model) {
                    return $model->compravalida == 'CONF' ? 'Confirmada e Paga' : $model->compravalida == 'AGUARDACONF' ? 'Aguardando Confirmacao e Pagamento' : 'Invalida';
                }
            ],
            'data_horario',
           // 'valretornocashback:currency',
            [
                'attribute' => 'urlnfsefaz',
                'format' => 'raw',
                'value' => function ($model) {
                      return Html::a('Acessar Nota', $model->urlnfsefaz);
                 },
            ],
            'forma_pagto',
            'dat_hora_leitura:datetime',
        ],
    ]) ?>

</div>
