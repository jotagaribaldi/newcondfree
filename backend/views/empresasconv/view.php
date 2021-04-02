<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresasconv */

$this->title = $model->id_emrpesaconv;
$this->params['breadcrumbs'][] = ['label' => 'Empresas Conveniadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empresasconv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id_emrpesaconv], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id_emrpesaconv], [
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
            'id_emrpesaconv',
            [
                'attribute' => 'parceiro.razaosocial',
                'label'     => 'Parceiro',
            ],
            'razaosocial',
            'nomefantasia',
            'segmento',
            'percent_cash',
            'CEP',
            'endereco_parc',
            'complem_parc',
            [
                'attribute' => 'cidades.CT_NOME',
                'label'     => 'Município',
            ],
            [
                'attribute' => 'estados.UF_UF',
                'label'     => 'UF'
            ],
            'num_ender_emp',
            'bairro_emp',
            'doc_empresa',
            'fonefixo_emp',
            'fonecel_emp',
            'email_emp:email',
            'link_instag',
            'link_facebook',
           // 'logo_empresa',
             [
               'attribute' => 'logo_empresa',
               'label'     => 'Logo Empresa',
               'format'    => ['image',['width'=>'177','height'=>'117']],
            ],
            [
                'attribute' => 'termo_digital',
                'format'    => 'raw',
                'value' => Html::a('Download Termo',$model->termo_digital),
            ],
            'datahoracad_emp:datetime',
            'ip_register_emp',
            'user_id_reg_emp',
        ],
    ]) ?>

</div>
