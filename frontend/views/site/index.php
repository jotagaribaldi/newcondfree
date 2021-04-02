<?php

use backend\models\Condominos;
use backend\models\Condominios;
use backend\models\User;
use yii\helpers\Html;
/* @var $this yii\web\View */

if (isset(Yii::$app->user->identity->id)) {
    $objcond = User::find()->joinWith('condominos')->where(['id' => Yii::$app->user->identity->id])->one();
    $objcondo = Condominios::find()->where(['id_condom' => $objcond->condominio_id])->one();
    if(!isset($objcond->condominos[0]['id_morad'])){
    	die('<br/><br/><h3 align="center" style="color:red;"> -- ATENÇÃO --</h3><h4 align="center" style="color:blue;">O seu usuário ainda nao foi validado pelo síndico(a) do seu condomínio. Solicite a ele(a) que aprove o seu cadastro.</h4><p align="center" >Em caso de dúvidas entre em contato pelo Whats app <a href="https://api.whatsapp.com/send?phone=556384561872&text=Olá,%20por%20favor,%20valide%20meu%20cadastro%20no%20sistema%20Condomínio%20Livre
">[ Chame aqui ]</a></p>');
    } 
  //  echo"Teste ".count($objcond);
    //	if ($objcond->){
    //		die('Parei aqui!');

    //	}
    $objcondmino = 	Condominos::Saldocbmes($objcond->condominos[0]['id_morad'], date('m/Y'));
}

$this->title = 'Suprema Cashback';
?>
<div class="site-index">

    <div class="body-content">
        <?php   if (isset(Yii::$app->user->identity->id)) { ?>
        <div class="row">
            <div class="col-lg-4">
                
                <p>Olá, <?=$objcond->first_name  ?>.</p>
               
            </div>
            <div class="col-lg-4">
                 <?php  //var_dump($objcond->condominos); 

                 //echo "Id condomino: ".$objcond->condominos[0]['id_morad'];
                 ?>

                <p>Seu saldo CashBack:</p>
                <h3><?=Yii::$app->formatter->asCurrency(($objcondmino['acumulcb'] * 0.9)) ?></h3>
                
                 
            </div>
            <div class="col-lg-4">
                
                <p><a class="btn btn-default" href="/app/newcondfree/frontend/web/index.php?r=comprasrealiz%2Findex">Extrato &raquo;</a></p>

                
            </div>
        </div>
    <?php } ?>

    </div>


    <div class="jumbotron">
       <!-- <h1>Congratulations!</h1> -->
    <?php   if (isset(Yii::$app->user->identity->id)) { ?>
        <?= Html::img('/app/newcondfree/backend/web/'.$objcondo->logo_condom, ['alt'=>'Logo Condominio',]);  ?>
    <?php } else { ?>
        <?= Html::img('/app/newcondfree/backend/web/uploads/logoSiteCondlivre.png', ['alt'=>'Logo Condominio Livre',]);  ?>
    <?php } ?>
        <p class="lead">É dinheiro de volta a cada compra. A sua taxa de condomínio pode ser <span class="not-set"> zerada.</span></p>
    <?php   if (isset(Yii::$app->user->identity->id)) { ?>    
        <p><a class="btn btn-lg btn-success" href="/app/newcondfree/frontend/web/index.php?r=comprasrealiz/create">Ler QR Code</a></p>
     <?php } else { ?>  
 		<p><a class="btn btn-lg btn-success" href="/app/newcondfree/frontend/web/index.php?r=site/login">Login</a></p>
    <?php } ?> 	
    </div>

    <div class="body-content">

        <div class="row">
        <!--    <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>  -->
        <!--    <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>  -->
         <!--   <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div> -->
        </div>

    </div>
</div>
