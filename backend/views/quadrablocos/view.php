<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Quadrablocos */

$this->title = $model->id_qdblo;
$this->params['breadcrumbs'][] = ['label' => 'Quadras - Blocos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="quadrablocos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_qdblo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_qdblo], [
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
            'id_qdblo',
            'condominio.nome_condomi',
            'descricao_qdblo',
         //   'user_id_regist_qd',
            'ip_regist_qd',
            'datahoracad_qd:datetime',
        ],
    ]) ?>

</div>
