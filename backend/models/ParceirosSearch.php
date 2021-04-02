<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Parceiros;

/**
 * ParceirosSearch represents the model behind the search form of `backend\models\Parceiros`.
 */
class ParceirosSearch extends Parceiros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_parceiro', 'UF', 'user_id_register', 'user_id'], 'integer'],
            [['razaosocial', 'municipio', 'nomefantasia', 'empr_adm_cond', 'CEP', 'endereco_parc', 'complem_parc', 'num_ender_parc', 'bairro_parc', 'tipo_parc_pfpj', 'doc_parceiro', 'fonefixo_parc', 'fonecel_parc', 'email_parc', 'website_parc', 'datahoracad_parc', 'ip_register_parc'], 'safe'],
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
        $query = Parceiros::find();

        // add conditions that should always apply here
	$query->joinWith('cidades');

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
            'id_parceiro' => $this->id_parceiro,
           // 'municipio' => $this->municipio,
            'UF' => $this->UF,
	    'user_id'  =>  $this->user_id,
            'datahoracad_parc' => $this->datahoracad_parc,
            'user_id_register' => $this->user_id_register,
        ]);

        $query->andFilterWhere(['like', 'razaosocial', $this->razaosocial])
            ->andFilterWhere(['like', 'nomefantasia', $this->nomefantasia])
            ->andFilterWhere(['like', 'empr_adm_cond', $this->empr_adm_cond])
            ->andFilterWhere(['like', 'CEP', $this->CEP])
	    ->andFilterWhere(['like', 'cidade.CT_NOME', $this->municipio])
            ->andFilterWhere(['like', 'endereco_parc', $this->endereco_parc])
            ->andFilterWhere(['like', 'complem_parc', $this->complem_parc])
            ->andFilterWhere(['like', 'num_ender_parc', $this->num_ender_parc])
            ->andFilterWhere(['like', 'bairro_parc', $this->bairro_parc])
            ->andFilterWhere(['like', 'tipo_parc_pfpj', $this->tipo_parc_pfpj])
            ->andFilterWhere(['like', 'doc_parceiro', $this->doc_parceiro])
            ->andFilterWhere(['like', 'fonefixo_parc', $this->fonefixo_parc])
            ->andFilterWhere(['like', 'fonecel_parc', $this->fonecel_parc])
            ->andFilterWhere(['like', 'email_parc', $this->email_parc])
            ->andFilterWhere(['like', 'website_parc', $this->website_parc])
            ->andFilterWhere(['like', 'ip_register_parc', $this->ip_register_parc]);

        return $dataProvider;
    }
}
