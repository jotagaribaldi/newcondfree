<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FaturaEmpresasconv;

/**
 * FaturaEmpresasconvSearch represents the model behind the search form of `backend\models\FaturaEmpresasconv`.
 */
class FaturaEmpresasconvSearch extends FaturaEmpresasconv
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idfatura', 'empresaconv_id', 'user_cad_fatura'], 'integer'],
            [['data_fechamentofat', 'status_fatura', 'datahora_abert_fatura', 'datapagtofat', 'id_boletogerado', 'ip_cad_fatura'], 'safe'],
            [['valor_total'], 'number'],
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
        $query = FaturaEmpresasconv::find();

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
            'idfatura' => $this->idfatura,
            'empresaconv_id' => $this->empresaconv_id,
            'data_fechamentofat' => $this->data_fechamentofat,
            'valor_total' => $this->valor_total,
            'datahora_abert_fatura' => $this->datahora_abert_fatura,
            'datapagtofat' => $this->datapagtofat,
            'user_cad_fatura' => $this->user_cad_fatura,
        ]);

        $query->andFilterWhere(['like', 'status_fatura', $this->status_fatura])
            ->andFilterWhere(['like', 'id_boletogerado', $this->id_boletogerado])
            ->andFilterWhere(['like', 'ip_cad_fatura', $this->ip_cad_fatura]);

        return $dataProvider;
    }
}
