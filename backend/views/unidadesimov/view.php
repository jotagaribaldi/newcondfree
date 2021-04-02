<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Unidadesimov */

$this->title = $model->id_imov;
$this->params['breadcrumbs'][] = ['label' => 'Unidades - Imóveis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unidadesimov-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_imov], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_imov], [
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
          //  'id_imov',
            [
            'label'=>'Condomínio',
            'attribute' => 'quadraBloco.condominio.nome_condomi',
            ],
            [
             'attribute' => 'quadraBloco.descricao_qdblo',
             'label'=>'Quadra ou Bloco',
            ],
             'nome_unidade',
            [
             'label'  => 'Nome Proprietario' ,
             //'attribute' => 'condominoUnid.user.first_name',
             'attribute' => function ($model) {
                                return $model->condominoUnid->user->first_name . ' ' . $model->condominoUnid->user->last_name;
                            }
            ],
            [
                'attribute' => function ($model) {
                                if(is_null($model->locatario_id)) {
                                    return "<span class=\"not-set\">(não definido)</span>";
                                } else {
                                    return $model->condominoUnidlocat->user->first_name . ' ' . $model->condominoUnidlocat->user->last_name;
                                }
                            },
                'label' => 'Nome Locatário',
                 'format'=>'raw'
            ],            
            'data_cad_und:datetime',
            'ip_regist_und',
            'user_cad_und',
        ],
    ]) ?>

</div>
