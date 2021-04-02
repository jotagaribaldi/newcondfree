<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Empresasconv;

/**
 * EmpresasconvSearch represents the model behind the search form of `backend\models\Empresasconv`.
 */
class EmpresasconvSearch extends Empresasconv
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_emrpesaconv', 'parceiro_id', 'municipio_emp', 'UF_emp', 'user_id_reg_emp'], 'integer'],
            [['razaosocial', 'nomefantasia', 'segmento', 'CEP', 'endereco_parc', 'complem_parc', 'num_ender_emp', 'bairro_emp', 'doc_empresa', 'fonefixo_emp', 'fonecel_emp', 'email_emp', 'link_instag', 'link_facebook', 'logo_empresa', 'termo_digital', 'datahoracad_emp', 'status', 'ip_register_emp'], 'safe'],
            [['percent_cash'], 'number'],
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
        $query = Empresasconv::find();

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
            'id_emrpesaconv' => $this->id_emrpesaconv,
            'parceiro_id' => $this->parceiro_id,
            'percent_cash' => $this->percent_cash,
            'municipio_emp' => $this->municipio_emp,
            'UF_emp' => $this->UF_emp,
            'status' => $this->status,
            'datahoracad_emp' => $this->datahoracad_emp,
            'user_id_reg_emp' => $this->user_id_reg_emp,
        ]);

        $query->andFilterWhere(['like', 'razaosocial', $this->razaosocial])
            ->andFilterWhere(['like', 'nomefantasia', $this->nomefantasia])
            ->andFilterWhere(['like', 'segmento', $this->segmento])
            ->andFilterWhere(['like', 'CEP', $this->CEP])
            ->andFilterWhere(['like', 'endereco_parc', $this->endereco_parc])
            ->andFilterWhere(['like', 'complem_parc', $this->complem_parc])
            ->andFilterWhere(['like', 'num_ender_emp', $this->num_ender_emp])
            ->andFilterWhere(['like', 'bairro_emp', $this->bairro_emp])
            ->andFilterWhere(['like', 'doc_empresa', $this->doc_empresa])
            ->andFilterWhere(['like', 'fonefixo_emp', $this->fonefixo_emp])
            ->andFilterWhere(['like', 'fonecel_emp', $this->fonecel_emp])
            ->andFilterWhere(['like', 'email_emp', $this->email_emp])
            ->andFilterWhere(['like', 'link_instag', $this->link_instag])
            ->andFilterWhere(['like', 'link_facebook', $this->link_facebook])
            ->andFilterWhere(['like', 'logo_empresa', $this->logo_empresa])
            ->andFilterWhere(['like', 'termo_digital', $this->termo_digital])
            ->andFilterWhere(['like', 'ip_register_emp', $this->ip_register_emp]);

        return $dataProvider;
    }
}
