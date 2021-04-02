<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Compracontigenc;

/**
 * CompracontigencSearch represents the model behind the search form of `frontend\models\Compracontigenc`.
 */
class CompracontigencSearch extends Compracontigenc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_comprascont', 'condomino_idcont', 'comprasrealiz_id', 'user_id_confirma'], 'integer'],
            [['cnpj_empresacont', 'nfnum_cont', 'nfce_confirmada', 'urlnfcesefazcont', 'num_serie', 'modelo_nfce', 'anomesnfce', 'data_leitura_cf', 'codigo_chavenfce', 'foto_comprovcomp'], 'safe'],
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
        $query = Compracontigenc::find();

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
            'id_comprascont' => $this->id_comprascont,
            'condomino_idcont' => $this->condomino_idcont,
            'comprasrealiz_id' => $this->comprasrealiz_id,
            'data_leitura_cf' => $this->data_leitura_cf,
            'user_id_confirma' => $this->user_id_confirma,
        ]);

        $query->andFilterWhere(['like', 'cnpj_empresacont', $this->cnpj_empresacont])
            ->andFilterWhere(['like', 'nfnum_cont', $this->nfnum_cont])
            ->andFilterWhere(['like', 'nfce_confirmada', $this->nfce_confirmada])
            ->andFilterWhere(['like', 'urlnfcesefazcont', $this->urlnfcesefazcont])
            ->andFilterWhere(['like', 'num_serie', $this->num_serie])
            ->andFilterWhere(['like', 'modelo_nfce', $this->modelo_nfce])
            ->andFilterWhere(['like', 'anomesnfce', $this->anomesnfce])
            ->andFilterWhere(['like', 'codigo_chavenfce', $this->codigo_chavenfce])
            ->andFilterWhere(['like', 'foto_comprovcomp', $this->foto_comprovcomp]);

        return $dataProvider;
    }
}
