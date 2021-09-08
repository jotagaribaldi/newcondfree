<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaEmpresasconv */

$this->title = $model->idfatura;
$this->params['breadcrumbs'][] = ['label' => 'Faturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fatura-empresasconv-view">

    <h1><?= Html::encode($this->title) ?></h1>
     <div id="message">

          <?= Yii::$app->session->getFlash('success');?>
      </div>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->idfatura], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->idfatura], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

         <?=$model->status_fatura == 'ABERTA' ? Html::a('Incluir Compras', ['fatura-detalhes/create', 'id' => $model->idfatura], ['class' => 'btn btn-info']) : "&nbsp;<b>NOTA PAGA/FECHADA</b>" ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idfatura',
            'empresaconv_id',
            'empresaconv.nomefantasia',
            'data_fechamentofat:datetime',
            'valor_total:currency',
            'status_fatura',
            'datahora_abert_fatura:datetime',
            'datapagtofat:datetime',
            'ip_cad_fatura',
            'user_cad_fatura',
        ],
    ]) ?>

</div>
