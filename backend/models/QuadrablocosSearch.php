<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Quadrablocos;

/**
 * QuadrablocosSearch represents the model behind the search form of `backend\models\Quadrablocos`.
 */
class QuadrablocosSearch extends Quadrablocos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_qdblo', 'condominio_id', 'user_id_regist_qd'], 'integer'],
            [['descricao_qdblo', 'ip_regist_qd', 'datahoracad_qd'], 'safe'],
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
        $query = Quadrablocos::find();

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
            'id_qdblo' => $this->id_qdblo,
            'condominio_id' => $this->condominio_id,
            'user_id_regist_qd' => $this->user_id_regist_qd,
            'datahoracad_qd' => $this->datahoracad_qd,
        ]);

        $query->andFilterWhere(['like', 'descricao_qdblo', $this->descricao_qdblo])
            ->andFilterWhere(['like', 'ip_regist_qd', $this->ip_regist_qd]);

        return $dataProvider;
    }
}
