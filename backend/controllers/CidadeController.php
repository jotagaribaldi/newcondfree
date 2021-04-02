<?php

namespace backend\controllers;

use Yii;
use backend\models\Cidade;
use backend\models\CidadeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query; 



class CidadeController extends Controller
{

	 /**
     * {@inheritdoc}
     */
     

	public function actionLists($id){
		$countPosts = Cidade::find()->where(['CT_UF' => $id])->count();  
		$posts = Cidade::find()->where(['CT_UF' => $id])->orderBy('CT_NOME')->all();
		$dataProvider = new \yii\data\ArrayDataProvider(['models' => $posts]);
		if($countPosts > 0) {
			foreach($posts as $post){
				echo "<option value='".$post->CT_ID."'>".$post->CT_NOME."</option>"; 
			}
			} else {
				echo "<option> - </option>";
			}
		}
}
