<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Parceiros */

$this->title = $model->id_parceiro;
$this->params['breadcrumbs'][] = ['label' => 'Parceiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="parceiros-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_parceiro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_parceiro], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Certeza que deseja excluir este parceiro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_parceiro',
	    [
		'attribute'  => 'user.username',
		'label'	     => 'Usuário',
            ],
            'razaosocial',
            'nomefantasia',
            'empr_adm_cond',
            'CEP',
            'endereco_parc',
            'complem_parc',
            [
                'attribute' => 'cidades.CT_NOME',
                'label'     => 'Cidade'
            ],
            [
                'attribute' => 'estados.UF_NOME',
                'label'     => 'Estado'
            ],
            'num_ender_parc',
            'bairro_parc',
            'tipo_parc_pfpj',
            'doc_parceiro',
            'fonefixo_parc',
            'fonecel_parc',
            'email_parc:email',
            'website_parc',
            'datahoracad_parc:datetime',
            'ip_register_parc',
            'user_id_register',
        ],
    ]) ?>

</div>
