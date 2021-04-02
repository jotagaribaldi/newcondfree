<?php

namespace backend\controllers;

use Yii;
use backend\models\Empresasconv;
use backend\models\EmpresasconvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * EmpresasconvController implements the CRUD actions for Empresasconv model.
 */
class EmpresasconvController extends Controller
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
     * Lists all Empresasconv models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresasconvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


   public function actionIndexpub()
    {
        $searchModel = new EmpresasconvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexpub', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Empresasconv model.
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
     * Creates a new Empresasconv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empresasconv();

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            $model->logo_empresa = UploadedFile::getInstance($model, 'logo_empresa');  
            $image_name =  $model->id_emrpesaconv.$model->nomefantasia.rand(1,4000).'.'.$model->logo_empresa->extension;
            $image_path = 'uploads/empresas/'.$image_name;
            $model->logo_empresa->saveAs($image_path);
            $model->logo_empresa = $image_path;
            /*** Upload do termo ***/
            $model->termo_digital = UploadedFile::getInstance($model, 'termo_digital');  
            $filepdf_name =  $model->id_emrpesaconv.$model->nomefantasia.rand(1,4000).'.'.$model->termo_digital->extension;
            $filepdf_path = 'uploads/empresas/termos/'.$filepdf_name;
            $model->termo_digital->saveAs($filepdf_path);
            $model->termo_digital = $filepdf_path;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_emrpesaconv]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Empresasconv model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_emrpesaconv]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Empresasconv model.
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
     * Finds the Empresasconv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresasconv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresasconv::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
