<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Unidadesimov;

/**
 * UnidadesimovSearch represents the model behind the search form of `backend\models\Unidadesimov`.
 */
class UnidadesimovSearch extends Unidadesimov
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_imov', 'condominio_id', 'quadra_bloco_id', 'proprietario_id', 'locatario_id', 'user_cad_und'], 'integer'],
            [['nome_unidade', 'data_cad_und','tipo_unidade', 'ip_regist_und'], 'safe'],
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
        $query = Unidadesimov::find();

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
            'id_imov' => $this->id_imov,
            'condominio_id' => $this->condominio_id,
            'quadra_bloco_id' => $this->quadra_bloco_id,
            'proprietario_id' => $this->proprietario_id,
            'locatario_id' => $this->locatario_id,
            'data_cad_und' => $this->data_cad_und,
            'user_cad_und' => $this->user_cad_und,
        ]);

        $query->andFilterWhere(['like', 'nome_unidade', $this->nome_unidade])
	   ->andFilterWhere(['like', 'tipo_unidade', $this->tipo_unidade])
            ->andFilterWhere(['like', 'ip_regist_und', $this->ip_regist_und]);

        return $dataProvider;
    }
}
