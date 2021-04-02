<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "condominios".
 *
 * @property int $id_condom
 * @property int $parceiro_id
 * @property string $nome_condomi
 * @property string|null $cep
 * @property string|null $endereco
 * @property string|null $num_condom
 * @property string|null $compl_ender_cond
 * @property int $cidade_cond
 * @property int $uf_cond
 * @property string|null $fonefixo_cond
 * @property string|null $celular_gerente
 * @property string|null $cnpj_condom
 * @property string|null $nome_gerente
 * @property string $ip_cond_cad
 * @property string $datahoracad_cond
 * @property int $user_cad_cond
 *
 * @property Parceiros $parceiro
 * @property Sindicos[] $sindicos
 */
class Condominios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'condominios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parceiro_id', 'nome_condomi', 'cidade_cond', 'statuscond','uf_cond', 'ip_cond_cad', 'user_cad_cond'], 'required'],
            [['parceiro_id', 'cidade_cond', 'uf_cond', 'user_cad_cond'], 'integer'],
            [['datahoracad_cond'], 'safe'],
            [['logo_condom'], 'file', 'extensions' => 'jpg,png,jpeg,gif'],
            [['nome_condomi', 'endereco'], 'string', 'max' => 100],
            [['cep', 'fonefixo_cond', 'celular_gerente'], 'string', 'max' => 15],
            [['num_condom', 'statuscond'], 'string', 'max' => 14],
            [['compl_ender_cond'], 'string', 'max' => 50],
            [['cnpj_condom'], 'string', 'max' => 20],
            [['nome_gerente'], 'string', 'max' => 80],
            [['logo_condom'], 'string', 'max' => 240],
            [['ip_cond_cad'], 'string', 'max' => 33],
            [['parceiro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parceiros::className(), 'targetAttribute' => ['parceiro_id' => 'id_parceiro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_condom' => 'ID',
            'parceiro_id' => 'Parceiro',
            'nome_condomi' => 'Nome Condomínio',
            'cep' => 'CEP',
            'endereco' => 'Endereço',
            'num_condom' => 'Número',
            'compl_ender_cond' => 'Complemento',
            'cidade_cond' => 'Cidade',
            'uf_cond' => 'UF',
	    'logo_condom' => 'Logomarca', 
            'fonefixo_cond' => 'Fone Fixo',
            'statuscond' => 'Situação',
            'celular_gerente' => 'Celular do Gerente',
            'cnpj_condom' => 'CNPJ do Condomínio',
            'nome_gerente' => 'Nome do Gerente',
            'ip_cond_cad' => 'IP Cadastro',
            'datahoracad_cond' => 'Data Hora Cadastro',
            'user_cad_cond' => 'Usuário Cadastro',
        ];
    }

    /**
     * Gets query for [[Parceiro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParceiro()
    {
        return $this->hasOne(Parceiros::className(), ['id_parceiro' => 'parceiro_id']);
    }

    /**
     * Gets query for [[Sindicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSindicos()
    {
        return $this->hasMany(Sindicos::className(), ['condominio_id' => 'id_condom']);
    }

    public function getCidades()
    {
    return $this->hasOne(Cidade::className(), ['CT_ID' => 'cidade_cond']);
    }

    public function getEstados()
    {
        return $this->hasOne(Estado::className(), ['UF_ID' => 'uf_cond']);
    }

    public function getCondominos()
    {
        return $this->hasMany(Condominos::className(), ['condominio_id' => 'id_condom']);
    }
    
}
