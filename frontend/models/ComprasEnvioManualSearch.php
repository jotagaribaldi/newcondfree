<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ComprasEnvioManual;

/**
 * ComprasEnvioManualSearch represents the model behind the search form of `frontend\models\ComprasEnvioManual`.
 */
class ComprasEnvioManualSearch extends ComprasEnvioManual
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_compramanu', 'condomino_id_manu', 'comprasrealiz_id_manu', 'nfnum_manu'], 'integer'],
            [['cnpj_empresaconv_manu', 'compravalida_manu', 'imagem_nfce', 'data_horaenvio'], 'safe'],
            [['valor_totalnota'], 'number'],
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
        $query = ComprasEnvioManual::find();

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
            'id_compramanu' => $this->id_compramanu,
            'condomino_id_manu' => $this->condomino_id_manu,
            'comprasrealiz_id_manu' => $this->comprasrealiz_id_manu,
            'nfnum_manu' => $this->nfnum_manu,
            'data_horaenvio' => $this->data_horaenvio,
            'valor_totalnota' => $this->valor_totalnota,
        ]);

        $query->andFilterWhere(['like', 'cnpj_empresaconv_manu', $this->cnpj_empresaconv_manu])
            ->andFilterWhere(['like', 'compravalida_manu', $this->compravalida_manu])
            ->andFilterWhere(['like', 'imagem_nfce', $this->imagem_nfce]);

        return $dataProvider;
    }
}
