<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Comprasrealiz;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Comprasrealiz */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- <script type="text/javascript" src="instascan.min.js"></script> -->

<style>
#preview{
   width:400px;
   height:400px;
   margin:0px auto;
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<div class="comprasrealiz-form">

    <?php $form = ActiveForm::begin(); ?>

<?php
/*
echo odaialali\qrcodereader\QrReader::widget([
	'id' => 'qrInput',
	'successCallback' => "function(data){ $('#qrInput').val(data) }"
]); */
?>
    <video  id="preview"> </video>
    <script>
        /*
         let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            alert('Escaneou o conteudo: ' + content);
            window.open(content, "_blank");
        });
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("Não existe câmera no dispositivo!");
            }
        }); */
    </script>



    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" rel="nofollow"></script>


<script type="text/javascript">
    function hex_to_ascii(str1)
     {
        var hex  = str1.toString();
        var str = '';
        for (var n = 0; n < hex.length; n += 2) {
            str += String.fromCharCode(parseInt(hex.substr(n, 2), 16));
        }
        return str;
     }
</script>


<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(content){
       //alert('QR Code Lido com sucesso!');
        alert(content);
        console.log(content);
        var res = content.split("=");
        var cfconting = res[1].split("|");
        //alert(cfconting[0].length);
        if (cfconting[0].length == 44) {
        	alert('CF Emitido em Contingência. Pendente de Autorizaçao');
        	var cnpjcont = cfconting[0].substring(6,20);
        	var numnfcont = cfconting[0].substring(25,34);
        	var urlnfsefazcont = content;
        	var numseriecont = cfconting[0].substring(22,25);
        	var modelnfcont = cfconting[0].substring(20,22);
        	var anomescont = cfconting[0].substring(2,6);
        	var codchavecont = cfconting[0].substring(35,43);

        	$('#comprasrealiz-cnpj_empresaconv').val(cnpjcont);
        	$('#comprasrealiz-nfnum').val(numnfcont);
        	$('#comprasrealiz-urlnfsefaz').val(content);
        	$('#comprasrealiz-prosseg').prop('disabled', false);

        /*	var compcontg = [];
				compcontg["cnpj_empresacont"] = cnpjcont;
				compcontg["nfnum_cont"] = numnfcont;
				compcontg["urlnfcesefazcont"] = urlnfsefazcont;

				compcontg["num_serie"] = numseriecont;
				compcontg["modelo_nfce"] = modelnfcont;
				compcontg["anomesnfce"] = anomescont;
				compcontg["codigo_chavenfce"] = codchavecont;
		*/

        } else if (content.split("&dhEmi=") != null ) {
        	alert('NF Emitido Sem Contingência.');
	        var res2 = content.split("&dhEmi="); 
	        var res3 = content.split("&vNF=");
	        var lim_parada = res3[1].indexOf("&vICMS=");

	        console.log(lim_parada);
	        var cnpj = res[1].substring(6,20);
	        var numnf = res[1].substring(25,34);
	        var dataEmissao = res2[1].substring(0,50);
	        var valnf = res3[1].substring(0,lim_parada);
	        
	        $('#comprasrealiz-cnpj_empresaconv').val(cnpj);
	        $('#comprasrealiz-nfnum').val(numnf);
	        $('#comprasrealiz-data_horario').val(hex_to_ascii(dataEmissao));
	        $('#comprasrealiz-total_pago').val(valnf);
	        $('#comprasrealiz-urlnfsefaz').val(content);
	        $('#comprasrealiz-prosseg').prop('disabled', false);
	        //alert(content.split("p=")[1]);
	        //window.location.href=content;
	        console.log(valnf);
        } else {
        	alert('QR Code inválido');
        }
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            $('[name="options"]').on('change',function(){
                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });
        }else{
            console.error('No cameras found.');
            alert('Nenhuma camera encontrada.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
</script>
<div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="radio" name="options" value="1" autocomplete="off" checked> Câmera Frontal
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" value="2" autocomplete="off"> Câmera Traseira
  </label>
</div>

<?php 
     $modelx = new Comprasrealiz();
     $dadosCondno = $modelx->findCondomino(Yii::$app->user->identity->id);
 ?>

    <?= $form->field($model, 'condomino_id')->hiddenInput(['value' => $dadosCondno->id_morad])->label(false) ?>

    <?= $form->field($model, 'cnpj_empresaconv')->widget(MaskedInput::className(), ['mask' => '99.999.999/9999-99', 'options' => ['readOnly' => true]]) ?>

    <?= $form->field($model, 'nfnum')->hiddenInput(['maxlength' => true, 'readOnly'=> true])->label(false) ?>

    <?php //= $form->field($model, 'descr_servmercad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_horario')->hiddenInput(['readOnly'=> true])->label(false) ?>

    <?= $form->field($model, 'total_pago')->hiddenInput(['readOnly'=> true])->label(false) ?>

    <?php //= $form->field($model, 'forma_pagto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlnfsefaz')->hiddenInput()->label(false) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Prosseguir  &raquo;', ['class' => 'btn btn-success', 'id' => 'comprasrealiz-prosseg' , 'name' => 'comprasrealiz[prosseg]', 'disabled' => 'disabled' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
