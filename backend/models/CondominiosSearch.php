<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Condominios;

/**
 * CondominiosSearch represents the model behind the search form of `backend\models\Condominios`.
 */
class CondominiosSearch extends Condominios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_condom', 'parceiro_id', 'cidade_cond', 'uf_cond', 'user_cad_cond'], 'integer'],
            [['contratpercent'], 'number'],
            [['nome_condomi', 'cep', 'endereco', 'num_condom', 'compl_ender_cond', 'fonefixo_cond', 'celular_gerente', 'statuscond','cnpj_condom', 'nome_gerente', 'ip_cond_cad', 'datahoracad_cond'], 'safe'],
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
        $query = Condominios::find();

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
            'id_condom' => $this->id_condom,
            'parceiro_id' => $this->parceiro_id,
            'cidade_cond' => $this->cidade_cond,
            'uf_cond' => $this->uf_cond,
            'datahoracad_cond' => $this->datahoracad_cond,
            'user_cad_cond' => $this->user_cad_cond,
            'contratpercent' => $this->contratpercent,
        ]);

        $query->andFilterWhere(['like', 'nome_condomi', $this->nome_condomi])
            ->andFilterWhere(['like', 'cep', $this->cep])
            ->andFilterWhere(['like', 'endereco', $this->endereco])
            ->andFilterWhere(['like', 'num_condom', $this->num_condom])
            ->andFilterWhere(['like', 'compl_ender_cond', $this->compl_ender_cond])
            ->andFilterWhere(['like', 'fonefixo_cond', $this->fonefixo_cond])
            ->andFilterWhere(['like', 'celular_gerente', $this->celular_gerente])
            ->andFilterWhere(['like', 'cnpj_condom', $this->cnpj_condom])
            ->andFilterWhere(['like', 'nome_gerente', $this->nome_gerente])
            ->andFilterWhere(['like', 'statuscond', $this->statuscond])
            ->andFilterWhere(['like', 'ip_cond_cad', $this->ip_cond_cad]);

        return $dataProvider;
    }
}
