<?php

namespace backend\controllers;

use Yii;
use backend\models\Unidadesimov;
use backend\models\UnidadesimovSearch;
use backend\models\Condominos;
use backend\models\CondominosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnidadesimovController implements the CRUD actions for Unidadesimov model.
 */
class UnidadesimovController extends Controller
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
     * Lists all Unidadesimov models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UnidadesimovSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unidadesimov model.
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
     * Creates a new Unidadesimov model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Unidadesimov();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_imov]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Unidadesimov model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_imov]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Unidadesimov model.
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
     * Finds the Unidadesimov model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Unidadesimov the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Unidadesimov::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public function actionLists($id){
        $countPosts = Condominos::find()->joinWith('user.condominio')->where(['condominio_id' => $id])->andWhere(['morador_status' => 'ATIVO'])->count();  
       // $posts = Condominos::find()->select(['condominos.id_morad', 'condominos.user_id', 'user.username', 'user.first_name', 'user.last_name', 'condominos.morador_status'])->innerJoin('user', 'user.id = condominos.user_id')->joinWith('user')->where(['condominio_id' => $id])->andWhere(['morador_status' => 'ATIVO'])->orderBy('user.first_name')->all();
       
        $posts = Condominos::find()->select(['condominos.id_morad', 'condominos.user_id', 'user.username', 'user.first_name', 'user.last_name', 'condominos.morador_status'])->joinWith('user.condominio')->where(['condominio_id' => $id])->andWhere(['morador_status' => 'ATIVO'])->orderBy('user.first_name')->all();
        
        $dataProvider = new \yii\data\ArrayDataProvider(['models' => $posts]);
        if($countPosts > 0) {
            foreach($posts as $post){
                echo "<option value='".$post->id_morad."'>".$post->user->first_name."</option>"; 
            }
            } else { 
                echo "<option> - </option>";
            }

    }


    public function actionListsloc($id){
        $countPosts = Condominos::find()->joinWith('user.condominio')->where(['condominio_id' => $id])->andWhere(['morador_status' => 'ATIVO'])->count();  
               
        $posts = Condominos::find()->select(['condominos.id_morad', 'condominos.user_id', 'user.username', 'user.first_name', 'user.last_name', 'condominos.morador_status'])->joinWith('user.condominio')->where(['condominio_id' => $id])->andWhere(['morador_status' => 'ATIVO'])->orderBy('user.first_name')->all();
        
        $dataProvider = new \yii\data\ArrayDataProvider(['models' => $posts]);
        if($countPosts > 0) {
            foreach($posts as $post){
                echo "<option value='".$post->id_morad."'>".$post->user->first_name."</option>"; 
            }
            } else { 
                echo "<option> --- </option>";
            }

    }

}
