<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\FaturaEmpresasconv;
use backend\models\Empresasconv;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Comprasrealiz;


/* @var $this yii\web\View */
/* @var $model backend\models\FaturaDetalhes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fatura-detalhes-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php
      $fatemprmodel =  FaturaEmpresasconv::find()->with(['empresaconv'])->where(['idfatura' => $_GET['id']])->one();
      //print_r($fatemprmodel);
      $comprarealzmdl = Comprasrealiz::find()->with(['condomino.user'])->where(['cnpj_empresaconv' => $fatemprmodel->empresaconv['doc_empresa']])->andWhere(['compravalida' => 'CONF'])->andWhere([ '<>', 'statuspgto', 'PAGO'])->all();
      //print_r($comprarealzmdl); 
      $faturaiid = $fatemprmodel->idfatura;
    ?>
    <h4><?=$fatemprmodel->empresaconv['nomefantasia']?> | Fatura N.º <?=$fatemprmodel->idfatura?></h4>
    <p>CNPJ: <?=$fatemprmodel->empresaconv['doc_empresa']?> | Telefone: <?=$fatemprmodel->empresaconv['fonefixo_emp']?> </p>
    <p>Data Fatura: <?=$fatemprmodel->datahora_abert_fatura?> | Status Fatura: <?=$fatemprmodel->status_fatura?> </p>
    <p> INSERIR TRIGGER AO insert on fatura detalhe, compra realiza mudar estados para pedente pagamento. </p>


    <?= $form->field($model, 'fatura_empresaconv')->hiddenInput(['value' => $fatemprmodel->idfatura])->label(false) ?>

    <?= $form->field($model, 'comprarealiz_id')->textInput() ?>

    <?php /*= $form->field($model, 'comprarealiz_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Comprasrealiz::find()->with(['condomino.user'])->where(['cnpj_empresaconv' => $fatemprmodel->empresaconv['doc_empresa']])->all(), 'id_compras', function($model){ return $model->user['first_name'].' '.$model->user['last_name'].' - '. $model->user['condominio_id'];}),
         //'user.first_name'),
        'options' => ['prompt' => 'Selecione a compra...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);  */ ?>


    <?= $form->field($model, 'valor_compra')->textInput() ?>

    <?= $form->field($model, 'valor_cashback')->textInput() ?>

    <?= $form->field($model, 'valor_desconto_user')->textInput() ?>

    <?php //=  $form->field($model, 'datahoraregistro')->textInput() ?>

    <?= $form->field($model, 'id_user_registro')->hiddenInput(['value' => Yii::$app->user->identity->id] )->label(false)  ?>

    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php 
    foreach ($comprarealzmdl as $key => $value) {
        # code...
        //print_r($value);
        echo($value['id_compras'].'- '.$value['condomino_id'].' - '.$value['nfnum'].' - '.$value['condomino']['user']['first_name'].' - '.$value['cnpj_empresaconv'].'<br/>');
    }

?>
</div>
