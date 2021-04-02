<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Condominos;

/**
 * CondominosSearch represents the model behind the search form of `backend\models\Condominos`.
 */
class CondominosSearch extends Condominos
{
    /**
     * {@inheritdoc}
     */
    public $condominio_id, $first_name, $last_name, $cpfcnpj, $celularfone;

    public function rules()
    {
        return [
            [['id_morad', 'user_id', 'user_cad_id_mor', 'condominio_id'], 'integer'],
            [['morador_status', 'confirmado', 'titu_depend', 'first_name', 'last_name', 'cpfcnpj', 'celularfone' ,'data_cad_cond', 'ip_cad_mor_reg','UIDFireb'], 'safe'],
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
        $query = Condominos::find();

        // add conditions that should always apply here
        // $query->joinWith('user');

        // $query->joinWith(['condominios', 'user']);
        $query->joinWith('user.condominio');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['condominio_id'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['condominio_id' => SORT_ASC],
            'desc' => ['condominio_id' => SORT_DESC],
        ];

         $dataProvider->sort->attributes['first_name'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['first_name' => SORT_ASC],
            'desc' => ['first_name' => SORT_DESC],
        ];

         $dataProvider->sort->attributes['last_name'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['last_name' => SORT_ASC],
            'desc' => ['last_name' => SORT_DESC],
        ];

         $dataProvider->sort->attributes['cpfcnpj'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['cpfcnpj' => SORT_ASC],
            'desc' => ['cpfcnpj' => SORT_DESC],
        ];

         $dataProvider->sort->attributes['celularfone'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['celularfone' => SORT_ASC],
            'desc' => ['celularfone' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_morad' => $this->id_morad,
            'user_id' => $this->user_id,
            'condominios.id_condom' => $this->condominio_id,
            'data_cad_cond' => $this->data_cad_cond,
            'user_cad_id_mor' => $this->user_cad_id_mor,
            'confirmado'  => $this->confirmado ,  
            'titu_depend' => $this->titu_depend , 
        ]);

        $query->andFilterWhere(['like', 'morador_status', $this->morador_status])
            ->andFilterWhere(['like', 'user.first_name', $this->first_name])
            ->andFilterWhere(['like', 'user.last_name', $this->last_name])
            ->andFilterWhere(['like', 'user.cpfcnpj', $this->cpfcnpj])
            ->andFilterWhere(['like', 'user.celularfone', $this->celularfone])
            ->andFilterWhere(['like', 'UIDFireb', $this->UIDFireb]) 
            ->andFilterWhere(['like', 'ip_cad_mor_reg', $this->ip_cad_mor_reg]);

        return $dataProvider;
    }
}
