<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Compracontigenc */

$this->title = $model->id_comprascont;
$this->params['breadcrumbs'][] = ['label' => 'Compracontigencs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compracontigenc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_comprascont], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_comprascont], [
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
            'id_comprascont',
            'condomino_idcont',
            'comprasrealiz_id',
            'cnpj_empresacont',
            'nfnum_cont',
            'nfce_confirmada',
            'urlnfcesefazcont',
            'num_serie',
            'modelo_nfce',
            'anomesnfce',
            'data_leitura_cf',
            'codigo_chavenfce',
            'foto_comprovcomp',
            'user_id_confirma',
        ],
    ]) ?>

</div>
