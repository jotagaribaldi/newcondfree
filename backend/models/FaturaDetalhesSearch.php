<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FaturaDetalhes;

/**
 * FaturaDetalhesSearch represents the model behind the search form of `backend\models\FaturaDetalhes`.
 */
class FaturaDetalhesSearch extends FaturaDetalhes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_faturadetail', 'fatura_empresaconv', 'comprarealiz_id', 'id_user_registro'], 'integer'],
            [['datahoraregistro'], 'safe'],
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
        $query = FaturaDetalhes::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_faturadetail' => $this->id_faturadetail,
            'fatura_empresaconv' => $this->fatura_empresaconv,
            'comprarealiz_id' => $this->comprarealiz_id,
            'datahoraregistro' => $this->datahoraregistro,
            'id_user_registro' => $this->id_user_registro,
        ]);

        return $dataProvider;
    }
}
