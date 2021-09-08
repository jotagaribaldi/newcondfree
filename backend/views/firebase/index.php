<?php
require '../../../firebase/vendor/autoload.php';

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Kreait\Firebase\Factory;

//require '../../../../firebase/vendor/autoload.php';
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Dados Firebase';
?>
<h1><?= Html::encode($this->title) ?></h1>
<?php 

  $factory = ( new Factory())->withDatabaseUri('https://condominiolivreappc-default-rtdb.firebaseio.com/'); 

  $auth = $factory->createAuth();


  $cloudStorage = $factory->createStorage();
  $database = $factory->createDatabase();


$condominios = $database->getReference('condominios')->getSnapshot();
?>
<h3>Condomínios Cadastrados</h3>
 <table align="center" width="90%" border="1px">
 	<tr bgcolor="#ffcc44"><td align="center"><b> ID MySQL </b></td><td> <b> Condomínio nome </b>  </td><td><b>   Cidade </b> </td><td><b>   Nome Síndico </b> </td><td><b>   Telefone Contato </b> </td></tr>
<?php
              $somacondominio = 0;
              foreach ($condominios->getValue() as $x => $value) :
              		 $arraycond = explode(',', $value);
?>
	<tr><td align="center"> <?=$x?> </td><td>  <?=substr(substr($arraycond[0],2), 0,-1)?>   </td><td>    <?=substr(substr($arraycond[3],1), 0,-1)?>  </td><td>    <?=substr(substr($arraycond[1],1), 0,-1)?>  </td><td>    <?=substr(substr($arraycond[2],1), 0,-1)?>  </td></tr>
<?php
			 $somacondominio++;
              endforeach;
?>
	
</table>
<br/>
	<p><b>Total Condomínios Cadastrados: <?=$somacondominio ?></b></p>

<?php
 //foreach ($condominios->getValue() as $x => $valueimg) :
       //       		 $arraycondim = explode(',', $valueimg); ?>
              		    <p align="center">
                 <!--<img src="<?php //=substr(substr($arraycondim[4],1), 0,-2) ?>" width="296" heigth="117"  alt="Logo do  <?php //=substr(substr($arraycondim[0],2), 0,-1)?>  "> -->
                		</p>
<?php
   //           		  endforeach;
?>
<br/>
<h3>Condôminos Cadastrados</h3>

 <table align="center" width="90%" border="1px">
 	<tr bgcolor="#c1e5ff"><td align="center"><b>Ord</b></td><td><b> Rótulo Firebase </b></td><td> <b> Condômino Nome </b>  </td><td><b>CPF</b> </td><td><b>Telefone</b> </td><td><b>Condomínio</b> </td></tr>

<?php
			  $buscaCond = array();
			  $condominos = $database->getReference('condominos')->getSnapshot();	
              $somamorad = 0;
              //print_r($condominos);
              foreach ($condominos->getValue() as $xc => $valuec) :
              		 if($xc != 'nflidas') {
              		 	$arraymorad = explode(',', $valuec);
              		
?>					 
	<tr><td align="center"><b><?=$somamorad?></b> </td><td> <?=$xc?> </td><td><?=substr(substr($arraymorad[1],1), 0,-1)?></td><td><?=substr(substr($arraymorad[5],1), 0,-1)?></td><td><?=substr(substr($arraymorad[2],1), 0,-1)?></td><td> <?=substr(substr($arraymorad[4],1), 0,-1)?> </td></tr>
<?php
			 $somamorad++;
			 array_push($buscaCond, $arraymorad);
			  }
              endforeach;
?>
	
</table>
<br/>
	<p><b>Total Condôminos Cadastrados: <?=$somamorad ?></b></p>
<br/>
<h3>Notas Lidas</h3>



<table align="center" width="90%" border="1px">
	<tr bgcolor="#c1e500">
		<td><b>Ordem</b></td><td><b>Rótulo Nota</b></td><td><b>Rótulo FB Condômino</b></td><td><b>URL SEFAZ</b></td>
	</tr>
	<?php

	 $nflidas = $database->getReference('condominos/nflidas')->getSnapshot();

	   $nflidaqtd =0; 
            foreach ($nflidas->getValue() as $xy =>$nfvalue) : 
                $arraynflidas = explode(',', $nfvalue);

		

	?>
		<tr>
			<td align="center" bgcolor="#C0C0C0"> <b><?=$nflidaqtd?></b></td> <td><?=$xy?></td><td><?=substr(substr($arraynflidas[0],2), 0,-1)?></td><td> <a href="<?=preg_replace("/[^A-Za-z0-9\/.-=:?|]/", "", trim(stripslashes(substr(substr($arraynflidas[5],1),0,-1))))?>" rel="external" target="_blank"> <?=stripslashes(substr(substr($arraynflidas[5],1),0,-1))?> </a></td>
		</tr>
		<tr>
			<td colspan="2"><?=stripslashes(substr(substr($arraynflidas[6],1),0,-2))?></td>
			<td colspan="2">
			<?php
				//$find = array();
				//$rotulocond = substr(substr($arraynflidas[0],2), 0,-1);

				$mailcond = substr(substr($arraynflidas[2],1), 0,-1);
				
				foreach ($buscaCond as $keybc => $valuebc) {
					 
				
					if($mailcond == substr(substr($valuebc[0],2), 0,-1)) {

						$dadosurl = preg_split('/=/', trim(stripslashes(substr(substr($arraynflidas[5],1),0,-1)))); 
						//$chaveNF = $dadosurl[1];
						print_r(substr(substr($valuebc[1],1), 0,-1));
						echo(" - || - ");
						print_r(substr(substr($valuebc[2],1), 0,-1));
						echo(" - || - ");
						print_r(substr(substr($valuebc[5],1), 0,-1));
						echo(" - || - ");
						//print_r($dadosurl); 
						if (!isset($dadosurl[1])){
							echo('<span style="background-color: #ffffcc; color: red; font-size: 10pt;">NF Inválida. Leitura inconsistente</span>');
						} else {
							echo(substr($dadosurl[1], 0,44));
							echo(" - || - <br/>");
							echo(substr($dadosurl[1], 6,14));
							echo(" - || - ");
							echo(substr($dadosurl[1], 25,9));
						}
						echo(" - || - ");
						if (strlen(trim(stripslashes(substr(substr($arraynflidas[4],2),0,-2)))) > 0 ) {
							echo (trim(stripslashes(substr(substr($arraynflidas[4],2),0,-2))));	
						}  else {
							echo('<span style="background-color: #ffffcc; color: green; font-weight:bold; font-size: 12pt;">NOTA NOVA</span>');
						}
						echo(" - || - ");

						//echo(substr($dadosurl[2], 0,44));
						//echo(count($dadosurl));
						/*for ($i=0;$i<sizeof($dadosurl);$i++)
						{
						        echo "$i - $dadosurl[$i] <br>";
						} */

						//$pieces = explode("|", $dadosurl[1]);
						// print_r($dadosurl[0][1]);
					}
					
				
				}
				
			?>	
			</td>
		</tr>

	<?php
			 $nflidaqtd++;
			  
              endforeach;
?>
</table>



<p>Notas lidas por aplicativo: <?=$nflidaqtd?></p>

<?php
/*	$empresas = $database->getReference('empresasparc')->getSnapshot();

	 $somaempresas = 0;
              foreach ($empresas->getValue() as $xe => $valuem) :
              		 $arrayempr = explode(',', $valuem);
              		 print_r($arrayempr); */
?>
		<p><b>Empresa:</b> <?// = $xe?></p>


<?php
	/*		echo(substr(substr($arrayempr[0],2), 0,-1).' - <b>'.substr(substr($arrayempr[3],1), 0,-1).'</b> - Segmento: <b>'.substr(substr($arrayempr[1],1), 0,-1).'</b> - Porcent Cashback: <b>'. substr(substr($arrayempr[2],1), 0,-1).'</b><br/>');
			echo('Fone Fixo: <b>'.substr(substr($arrayempr[8],1), 0,-1).'</b> - Whatsapp: <b>'.substr(substr($arrayempr[7],1), 0,-1).'</b> - Endereço: <b>'. substr(substr($arrayempr[4],1), 0,-1).'</b> - Cidade: </b>'.substr(substr($arrayempr[5],1), 0,-1). '<br/>'); */
?>
			<hr/>
			<!-- <img src="<?php // = substr(substr($arrayempr[9],1), 0,-1) ?>" width="296" heigth="117"  alt="Logo do  <?php //=  substr(substr($arrayempr[3],1), 0,-1)?>  "> -->
		<!-- 	<p align="cente"><a href="<?php //=substr(substr($arrayempr[6],1), 0,-1) ?>">Como Chegar</a></p>  -->
			<?php
		//	 $somaempresas++;
        //     endforeach;
?>