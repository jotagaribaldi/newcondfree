<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cidade;

/**
 * CidadeSearch represents the model behind the search form of `app\models\Cidade`.
 */
class CidadeSearch extends Cidade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CT_ID', 'CT_UF', 'CT_IBGE'], 'integer'],
            [['CT_NOME'], 'safe'],
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
        $query = Cidade::find();

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
            'CT_ID' => $this->CT_ID,
            'CT_UF' => $this->CT_UF,
            'CT_IBGE' => $this->CT_IBGE,
        ]); 

        $query->andFilterWhere(['like', 'CT_NOME', $this->CT_NOME]);

        return $dataProvider;
    }
}
