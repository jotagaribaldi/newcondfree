<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sindicos;

/**
 * SindicosSearch represents the model behind the search form of `backend\models\Sindicos`.
 */
class SindicosSearch extends Sindicos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sindico', 'condominio_id', 'uf_sindi', 'cidade_sindico', 'user_id_cadsindico', 'usersind_id'], 'integer'],
            [['nome_sindico', 'inicio_mandato', 'fim_mandato', 'sindico_ativo', 'sindico_profi', 'celular_sindico', 'sexo', 'data_nasci_sindico', 'cep_sindico', 'endereco_sindico', 'num_ender_sindico', 'comple_ender_sind', 'bairro_sindico', 'ip_reg_sindico', 'datacad_sindico'], 'safe'],
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
        $query = Sindicos::find();

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
            'id_sindico' => $this->id_sindico,
            'condominio_id' => $this->condominio_id,
            'usersind_id'   => $this->usersind_id,
            'inicio_mandato' => $this->inicio_mandato,
            'fim_mandato' => $this->fim_mandato,
            'data_nasci_sindico' => $this->data_nasci_sindico,
            'uf_sindi' => $this->uf_sindi,
            'cidade_sindico' => $this->cidade_sindico,
            'user_id_cadsindico' => $this->user_id_cadsindico,
            'datacad_sindico' => $this->datacad_sindico,
        ]);

        $query->andFilterWhere(['like', 'nome_sindico', $this->nome_sindico])
            ->andFilterWhere(['like', 'sindico_ativo', $this->sindico_ativo])
            ->andFilterWhere(['like', 'sindico_profi', $this->sindico_profi])
            ->andFilterWhere(['like', 'celular_sindico', $this->celular_sindico])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'cep_sindico', $this->cep_sindico])
            ->andFilterWhere(['like', 'endereco_sindico', $this->endereco_sindico])
            ->andFilterWhere(['like', 'num_ender_sindico', $this->num_ender_sindico])
            ->andFilterWhere(['like', 'comple_ender_sind', $this->comple_ender_sind])
            ->andFilterWhere(['like', 'bairro_sindico', $this->bairro_sindico])
            ->andFilterWhere(['like', 'ip_reg_sindico', $this->ip_reg_sindico]);

        return $dataProvider;
    }
}
