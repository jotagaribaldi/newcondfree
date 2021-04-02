<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Comprasrealiz;

use backend\models\User;
use backend\models\Condominos;
use backend\models\Empresasconv;


/**
 * ComprasrealizSearch represents the model behind the search form of `backend\models\Comprasrealiz`.
 */
class ComprasrealizSearch extends Comprasrealiz
{
    /**
     * {@inheritdoc}
     */
    public $condominio, $retencao, $comissao, $doc_condomino;

    public function rules()
    {
        return [
            [['id_compras', 'condomino_id'], 'integer'],
            [['cnpj_empresaconv', 'nfnum', 'compravalida', 'descr_servmercad', 'data_horario', 'urlnfsefaz', 'forma_pagto', 'dat_hora_leitura', 'obsleituras', 'statuspgto', 'condominio', 'retencao', 'comissao', 'doc_condomino'], 'safe'],
            [['total_pago', 'valretornocashback'], 'number'],
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
        $query = Comprasrealiz::find();

         $query->joinWith(['condomino']);
         $query->joinWith(['condomino.user.condominio']);

        // $query->innerJoin('user', 'user');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['condominio'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['condominios.nome_condomi' => SORT_ASC],
        'desc' => ['condominios.nome_condomi' => SORT_DESC], 
        
        ];


         $dataProvider->sort->attributes['retencao'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['valretornocashback' => SORT_ASC],
        'desc' => ['valretornocashback' => SORT_DESC], 
        
        ];

         $dataProvider->sort->attributes['comissao'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['valretornocashback' => SORT_ASC],
        'desc' => ['valretornocashback' => SORT_DESC], 
        
        ];



         $dataProvider->sort->attributes['doc_condomino'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['user.cpfcnpj' => SORT_ASC],
        'desc' => ['user.cpfcnpj' => SORT_DESC], 
        
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        // grid filtering conditions
        $query->andFilterWhere([
            'id_compras' => $this->id_compras,
            'condomino_id' => $this->condomino_id,
            'total_pago' => $this->total_pago,
            'cnpj_empresaconv' => $this->cnpj_empresaconv,
            'valretornocashback' => $this->valretornocashback,
           // 'dat_hora_leitura' => $this->dat_hora_leitura,
            'compravalida'  => $this->compravalida,
            'condominios.nome_condomi'    => $this->condominio,
            'statuspgto' => $this->statuspgto,
        ]);

        //$query->andFilterWhere(['like', 'cnpj_empresaconv', $this->cnpj_empresaconv])
        $query->andFilterWhere(['like', 'nfnum', $this->nfnum])
            //->andFilterWhere(['like', 'compravalida', $this->compravalida])
            ->andFilterWhere(['like', 'dat_hora_leitura', $this->dat_hora_leitura])
            ->andFilterWhere(['like', 'descr_servmercad', $this->descr_servmercad])
            ->andFilterWhere(['like', 'data_horario', $this->data_horario])
            ->andFilterWhere(['like', 'urlnfsefaz', $this->urlnfsefaz])
            ->andFilterWhere(['like', 'forma_pagto', $this->forma_pagto])
            ->andFilterWhere(['like', 'user.cpfcnpj', $this->doc_condomino])
            ->andFilterWhere(['like', 'obsleituras', $this->obsleituras]);
         //   ->andFilterWhere(['like', 'statuspgto', $this->statuspgto]);

        return $dataProvider;
    }
}
