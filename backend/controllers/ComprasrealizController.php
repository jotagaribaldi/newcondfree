<?php

namespace backend\controllers;

use Yii;
use backend\models\Comprasrealiz;
use backend\models\Empresasconv;
use backend\models\ComprasrealizSearch;
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

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
           // $retfunc = $model->checkDuplicate($model->nfnum, $model->cnpj_empresaconv);
           // print_r($retfunc); die();
            if (is_null($model->checkDuplicate($model->nfnum, $model->cnpj_empresaconv))) {
                $modec = Empresasconv::find()->where(['doc_empresa' => $model->cnpj_empresaconv])->one();
                $model->valretornocashback = $model->total_pago * $modec->percent_cash;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id_compras]);
            } else {
                throw new NotFoundHttpException('Nota fiscal já cadastrada. Duplicidade nao permitida.');         
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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

       // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
        //  if (is_null($model->checkDuplicate($model->nfnum, $model->cnpj_empresaconv))) {
                $modec = Empresasconv::find()->where(['doc_empresa' => $model->cnpj_empresaconv])->one();
                $model->valretornocashback = $model->total_pago * $modec->percent_cash;
                $model->save();
            return $this->redirect(['view', 'id' => $model->id_compras]);
        //  } else {
        //        throw new NotFoundHttpException('Nota fiscal já cadastrada. Duplicidade nao permitida.');         
        //    }
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
