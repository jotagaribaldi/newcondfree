<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Condominios */

$this->title = $model->id_condom;
$this->params['breadcrumbs'][] = ['label' => 'Condominios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="condominios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_condom], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_condom], [
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
            'id_condom',
            [
                'attribute' => 'parceiro.razaosocial',
                'label'     => 'Nome Parceiro',
            ],
            'nome_condomi',
	        [
	           'attribute' => 'logo_condom',
		       'label'     => 'Logo Condomínio',
		       'format'    => ['image',['width'=>'177','height'=>'117']],
            ],
	        'cep',
            'endereco',
            'num_condom',
            'compl_ender_cond',
            'cidade_cond',
            'uf_cond',
            'fonefixo_cond',
            'celular_gerente',
            'cnpj_condom',
            'nome_gerente',
            'ip_cond_cad',
            'datahoracad_cond:datetime',
            'user_cad_cond',
        ],
    ]) ?>

</div>
