<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FaturaDetalhes */

$this->title = $model->id_faturadetail;
$this->params['breadcrumbs'][] = ['label' => 'Fatura Detalhes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fatura-detalhes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_faturadetail], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_faturadetail], [
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
            'id_faturadetail',
            'fatura_empresaconv',
            'comprarealiz_id',
            'valor_compra',
            'valor_cashback',
            'valor_desconto_user',
            'datahoraregistro',
            'id_user_registro',
        ],
    ]) ?>

</div>
