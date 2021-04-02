<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Comprasrealiz;

/**
 * ComprasrealizSearch represents the model behind the search form of `backend\models\Comprasrealiz`.
 */
class ComprasrealizSearch extends Comprasrealiz
{
    /**
     * {@inheritdoc}
     */
    public $nomempresa, $valorcshbck;
    public function rules()
    {
        return [
            [['id_compras', 'condomino_id'], 'integer'],
            [['cnpj_empresaconv', 'nomempresa', 'obsleituras', 'descr_servmercad', 'nfnum', 'compravalida', 'data_horario', 'forma_pagto', 'dat_hora_leitura'], 'safe'],
            [['total_pago', 'valorcshbck'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        
        $usrid = \Yii::$app->user->identity->id;
        $idcond = $this->findCondomino($usrid);    
        
        $query = Comprasrealiz::find()->where(['condomino_id' => $idcond->id_morad]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
      //  print_r($query);

        // grid filtering conditions
        $query->andFilterWhere([
            'id_compras' => $this->id_compras,
            'condomino_id' => $this->condomino_id,
            'total_pago' => $this->total_pago,
            'cnpj_empresaconv' => $this->nomempresa,
            'dat_hora_leitura' => $this->dat_hora_leitura,
            'compravalida'      => $this->compravalida,
            'valorcshbck'       => $this->valorcshbck,
        ]);

        $query->andFilterWhere(['like', 'cnpj_empresaconv', $this->cnpj_empresaconv])
            ->andFilterWhere(['like', 'nfnum', $this->nfnum])
            ->andFilterWhere(['like', 'data_horario', $this->data_horario])
           // ->andFilterWhere(['like', 'compravalida', $this->compravalida])
            ->andFilterWhere(['like', 'descr_servmercad', $this->descr_servmercad])
            ->andFilterWhere(['like', 'obsleituras', $this->obsleituras])
            ->andFilterWhere(['like', 'forma_pagto', $this->forma_pagto]);

        return $dataProvider;
    }
}
