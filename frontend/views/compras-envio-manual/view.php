<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ComprasEnvioManual */

$this->title = $model->id_compramanu;
$this->params['breadcrumbs'][] = ['label' => 'Compras Envio Manuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compras-envio-manual-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_compramanu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_compramanu], [
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
            'id_compramanu',
            'condomino_id_manu',
            'comprasrealiz_id_manu',
            'cnpj_empresaconv_manu',
            'nfnum_manu',
            'compravalida_manu',
            'imagem_nfce',
            'data_horaenvio',
            'valor_totalnota',
        ],
    ]) ?>

</div>
