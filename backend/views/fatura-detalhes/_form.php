<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\FaturaEmpresasconv;
use backend\models\Empresasconv;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Comprasrealiz;
use backend\models\FaturaDetalhes;


/* @var $this yii\web\View */
/* @var $model backend\models\FaturaDetalhes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fatura-detalhes-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
      $fatemprmodel =  FaturaEmpresasconv::find()->with(['empresaconv'])->where(['idfatura' => $_GET['id']])->one();
      $fatdetails  = FaturaDetalhes::find()->select(['comprarealiz_id'])->where(['fatura_empresaconv' => $fatemprmodel->idfatura])->all();

      $comprarealzmdl = Comprasrealiz::find()->with(['condomino.user'])->where(['cnpj_empresaconv' => $fatemprmodel->empresaconv['doc_empresa']])->andWhere(['compravalida' => 'CONF'])->andWhere([ '<>', 'statuspgto', 'PAGO'])->andWhere(['<>', 'statuspgto', 'FAT'])->all();

      
      $faturaiid = $fatemprmodel->idfatura;
    ?>

    
    <h4><?=$fatemprmodel->empresaconv['nomefantasia']?> | Fatura N.º <?=$fatemprmodel->idfatura?></h4>
    <p>CNPJ: <?=$fatemprmodel->empresaconv['doc_empresa']?> | Telefone: <?=$fatemprmodel->empresaconv['fonefixo_emp']?> </p>
    <p>Data Fatura: <?=$fatemprmodel->datahora_abert_fatura?> | Status Fatura: <?=$fatemprmodel->status_fatura?> </p>
    <p> INSERIR TRIGGER AO insert on fatura detalhe, compra realiza mudar estados para pedente pagamento. </p>

    <?php // echo('Total Pago: '. $comprarealzmdl->total_pago); ?>

    <?= $form->field($model, 'fatura_empresaconv')->hiddenInput(['value' => $fatemprmodel->idfatura])->label(false) ?>

    <?= $form->field($model, 'comprarealiz_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($comprarealzmdl, 'id_compras', function($model){ return $model->id_compras.' - '. $model->nfnum.' - R$ '.  money_format('%.2n', $model->total_pago).' - '.$model->statuspgto;}),
         
        'options' => ['prompt' => 'Selecione o Código da compra OU NF...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'id_user_registro')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false)  ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php 
    foreach ($comprarealzmdl as $key => $value) {
      
        echo($key.' - '.$value['id_compras'].' - '.$value['condomino_id'].' - '.$value['nfnum'].' - R$ '.money_format('%.2n', $value['total_pago']).' - '.$value['condomino']['user']['first_name'].' - '.$value['cnpj_empresaconv'].' - '.$value['statuspgto'].'<br/>');
    }

?>
</div>
 