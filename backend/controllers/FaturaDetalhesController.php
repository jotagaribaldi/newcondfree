<?php

namespace backend\controllers;

use Yii;
use backend\models\FaturaDetalhes;
use backend\models\FaturaDetalhesSearch;
use backend\models\Comprasrealiz;
use backend\models\FaturaEmpresasconv;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaturaDetalhesController implements the CRUD actions for FaturaDetalhes model.
 */
class FaturaDetalhesController extends Controller
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
     * Lists all FaturaDetalhes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FaturaDetalhesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FaturaDetalhes model.
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
     * Creates a new FaturaDetalhes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FaturaDetalhes();
        if ($model->load(Yii::$app->request->post())) {
            $valorCompra = Comprasrealiz::find()->select(['total_pago','valretornocashback'])->where(['id_compras' => $model->comprarealiz_id])->one();  
            $valorFatura = FaturaEmpresasconv::find()->select(['valor_total', 'idfatura'])->where(['idfatura' => $model->fatura_empresaconv])->one();
            $valor_fatura_atualiza = $valorFatura->valor_total + $valorCompra->valretornocashback;
            $model->setStatusfaturafat($model->comprarealiz_id);
            $model->setNovovalorfatura($valorFatura->idfatura, $valor_fatura_atualiza);
         //   print_r($model); 
            
            //echo('<br/><br/><br/><br/>Valor Compras: ');
            //print_r($valorCompra);
            //die();
            $model->save();
            Yii::$app->session->setFlash('success', "Compra Inserida na Fatura com Sucesso!");
            return $this->redirect(['fatura-empresas/view', 'id' => $model->fatura_empresaconv]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FaturaDetalhes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_faturadetail]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FaturaDetalhes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $valorCompra = Comprasrealiz::find()->select(['total_pago','valretornocashback'])->where(['id_compras' => $model->comprarealiz_id])->one();  
        $valorFatura = FaturaEmpresasconv::find()->select(['valor_total', 'idfatura'])->where(['idfatura' => $model->fatura_empresaconv])->one();
         
        $this->findModel($id)->delete();
        
        $valor_fatura_atualiza = $valorFatura->valor_total - $valorCompra->valretornocashback;
        $model->setStatusfaturapend($model->comprarealiz_id);
        $model->setNovovalorfatura($valorFatura->idfatura, $valor_fatura_atualiza);
        Yii::$app->session->setFlash('danger', "Compra Excluída da Fatura!");

        return $this->redirect(['index']);
    }

    /**
     * Finds the FaturaDetalhes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FaturaDetalhes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FaturaDetalhes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
