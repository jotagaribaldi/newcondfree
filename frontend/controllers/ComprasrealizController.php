<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Comprasrealiz;
use frontend\models\ComprasrealizSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComprasrealizController implements the CRUD actions for Comprasrealiz model.
 */
class ComprasrealizController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comprasrealiz models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ComprasrealizSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comprasrealiz model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comprasrealiz model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comprasrealiz();
        //$model->load(Yii::$app->request->post());
        //print_r($model);
        //$rtconscnpj = Comprasrealiz::getEmpresasconv($model->cnpj_empresaconv);
        //if (!is_null($rtconscnpj)) {
            //if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->load(Yii::$app->request->post())) { 
                $rtconscnpj = Comprasrealiz::getEmpresasconv($model->cnpj_empresaconv);
                if (!is_null($rtconscnpj)) {
                    if ($model->total_pago > 0) {
                        $model->valretornocashback = $model->total_pago * $rtconscnpj->percent_cash;
                    }
                    //var_dump($rtconscnpj);
                    $result = $model->save(); 

                    if($result){
                      //  print_r($model);
                        if (is_null($model->total_pago)) {
                        $idcomprarealiz = Yii::$app->db->getLastInsertID();
                      //  die('Entrei aqui: '.$idcomprarealiz);
                        $dadoscupom = $model->urlnfsefaz;
                        $pecas = explode("=", $dadoscupom);
                        $dadospecas = explode("|", $pecas[1]);
                       /* var_dump($dadospecas);
                        echo('CNPJ:'. Comprasrealiz::formatcpfcnpj(substr($dadospecas[0], 6,14)));
                        echo('<br/>Num NF: '.substr($dadospecas[0], 25,9));
                        echo('<br/>Num Série: '.substr($dadospecas[0], 22,3));
                        echo('<br/>Modelo: '.substr($dadospecas[0], 20,2));
                        echo('<br/>AnoMes: '.substr($dadospecas[0], 2,4));
                        echo('<br/>Codigo Chave: '.substr($dadospecas[0], 0,44)); */
                        $sql = "INSERT INTO `compracontigenc` (`id_comprascont`, `condomino_idcont`, `comprasrealiz_id`, `cnpj_empresacont`, `nfnum_cont`, `nfce_confirmada`, `urlnfcesefazcont`, `num_serie`, `modelo_nfce`, `anomesnfce`, `data_leitura_cf`, `codigo_chavenfce`, `foto_comprovcomp`, `user_id_confirma`) VALUES (NULL, ".$model->condomino_id.", ".$idcomprarealiz.", '".Comprasrealiz::formatcpfcnpj(substr($dadospecas[0], 6,14))."', '".substr($dadospecas[0], 25,9)."', 'AGUARDACONF', '".$model->urlnfsefaz."', '".substr($dadospecas[0], 22,3)."', '".substr($dadospecas[0], 20,2)."', '".substr($dadospecas[0], 2,4)."', CURRENT_TIMESTAMP, '".substr($dadospecas[0], 0,44)."', NULL, ".Yii::$app->user->identity->id.");";
                        //echo($sql);
                        Yii::$app->db->createCommand($sql)->execute();
                        //die();
                        //urlnfsefaz
                        /*    
                        INSERT INTO `compracontigenc` (`id_comprascont`, `condomino_idcont`, `comprasrealiz_id`, `cnpj_empresacont`, `nfnum_cont`, `nfce_confirmada`, `urlnfcesefazcont`, `num_serie`, `modelo_nfce`, `anomesnfce`, `data_leitura_cf`, `codigo_chavenfce`, `foto_comprovcomp`, `user_id_confirma`) VALUES (NULL, '9', '9', '13.783.221/0036-55', '000006019', 'CONF', 'https:///sefaz.to.gov.br', '030', '9', '2012', CURRENT_TIMESTAMP, '172101378322100365565030000006019991379654', NULL, '8'); */
                         }   
                    }

                   /* var_dump($result);


                                if (!$result){

                                    var_dump($model->attributes);

                                    var_dump($model->getErrors());

                                    die();

                                }
                    */
                    return $this->redirect(['view', 'id' => $model->id_compras]);
                } else {
                    throw new NotFoundHttpException('Empresa emissora da NF não cadastrada junto ao programa.');                    
                }
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        //} else {
          //  throw new NotFoundHttpException('Empresa não participante do programa Cashback');            
        //}
    }

    /**
     * Updates an existing Comprasrealiz model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_compras]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Comprasrealiz model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comprasrealiz model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comprasrealiz the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comprasrealiz::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
