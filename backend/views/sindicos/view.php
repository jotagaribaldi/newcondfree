<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sindicos */

$this->title = $model->id_sindico;
$this->params['breadcrumbs'][] = ['label' => 'Sindicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sindicos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_sindico], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_sindico], [
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
            'id_sindico',
            'nome_sindico',
            'condominio.nome_condomi',
            'inicio_mandato:date',
            'fim_mandato:date',
            'sindico_ativo',
            'sindico_profi',
            'celular_sindico',
            'sexo',
            'data_nasci_sindico:date',
            'cep_sindico',
            'endereco_sindico',
            'num_ender_sindico',
            'comple_ender_sind',
            'bairro_sindico',
            'estados.UF_NOME',
            'cidades.CT_NOME',
            'ip_reg_sindico',
            'user_id_cadsindico',
            'datacad_sindico:datetime',
        ],
    ]) ?>

</div>
