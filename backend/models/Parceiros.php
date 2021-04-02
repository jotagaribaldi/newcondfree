<?php

/*namespace app\models; */
namespace backend\models;
use Yii;

/**
 * This is the model class for table "parceiros".
 *
 * @property int $id_parceiro
 * @property string $razaosocial
 * @property string $nomefantasia
 * @property string $empr_adm_cond
 * @property string $CEP
 * @property string $endereco_parc
 * @property string $complem_parc
 * @property int $municipio
 * @property int $UF
 * @property string $num_ender_parc
 * @property string $bairro_parc
 * @property string $tipo_parc_pfpj
 * @property string $doc_parceiro
 * @property string|null $fonefixo_parc
 * @property string $fonecel_parc
 * @property string $email_parc
 * @property string $website_parc
 * @property string $datahoracad_parc
 * @property string $ip_register_parc
 * @property int $user_id_register
 *
 * @property Condominios[] $condominios
 * @property RepresentParceiros[] $representParceiros
 */
class Parceiros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parceiros';
    }

    /**
     * {@inheritdoc}

     */
    public function rules()
    {
        return [
            [['razaosocial', 'nomefantasia', 'empr_adm_cond', 'CEP', 'endereco_parc', 'municipio', 'UF', 'num_ender_parc', 'bairro_parc', 'tipo_parc_pfpj', 'doc_parceiro', 'fonecel_parc', 'email_parc', 'ip_register_parc', 'user_id_register', 'user_id'], 'required'],
            [['empr_adm_cond', 'tipo_parc_pfpj'], 'string'],
            [['municipio', 'UF', 'user_id_register', 'user_id'], 'integer'],
            [['datahoracad_parc'], 'safe'],
            [['razaosocial', 'nomefantasia'], 'string', 'max' => 100],
            [['CEP', 'num_ender_parc'], 'string', 'max' => 10],
            [['endereco_parc', 'email_parc', 'website_parc'], 'string', 'max' => 120],
            [['complem_parc'], 'string', 'max' => 40],
            [['bairro_parc'], 'string', 'max' => 90],
            [['doc_parceiro'], 'string', 'max' => 22],
            [['fonefixo_parc'], 'string', 'max' => 14],
            [['fonecel_parc'], 'string', 'max' => 15],
	    [['fonecel_parc', 'doc_parceiro', 'fonefixo_parc', 'email_parc'], 'unique'],
	    [['email_parc'], 'email'],
            [['ip_register_parc'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_parceiro' => 'ID',
            'razaosocial' => 'Razao Social',
            'nomefantasia' => 'Nome Fantasia',
            'empr_adm_cond' => 'Adm Condominio?',
            'CEP' => 'CEP',
	    'user_id'   =>   'Usuário',
            'endereco_parc' => 'Endereço',
            'complem_parc' => 'Complemento',
            'municipio' => 'Municipio',
            'UF' => 'UF',
            'num_ender_parc' => 'Número',
            'bairro_parc' => 'Bairro',
            'tipo_parc_pfpj' => 'Tipo Parceiro',
            'doc_parceiro' => 'Documento',
            'fonefixo_parc' => 'Fone Fixo',
            'fonecel_parc' => 'Fone Celular',
            'email_parc' => 'Email',
            'website_parc' => 'Website',
            'datahoracad_parc' => 'Data Cadastro',
            'ip_register_parc' => 'IP Registro',
            'user_id_register' => 'Cadastrado por',
        ];
    }

    /**
     * Gets query for [[Condominios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCondominios()
    {
        return $this->hasMany(Condominios::className(), ['parceiro_id' => 'id_parceiro']);
    }

    /**
     * Gets query for [[RepresentParceiros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepresentParceiros()
    {
        return $this->hasMany(RepresentParceiros::className(), ['parceiro_id' => 'id_parceiro']);
    }

    public function getCidades()
    {
	return $this->hasOne(Cidade::className(), ['CT_ID' => 'municipio']);
    }

    public function getEstados()
    {
        return $this->hasOne(Estado::className(), ['UF_ID' => 'UF']);
    }

    public function getUsercads()
    {
	return $this->hasOne(User::className(), ['id' => 'user_id_register']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

/*    public function getParceiros()
    {
        return self::find()->select(['razaosocial','id_parceiro'])->indexBy('id_parceiro')->collumn();
    }
*/
}
