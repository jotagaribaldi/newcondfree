<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "empresasconv".
 *
 * @property int $id_emrpesaconv
 * @property int $parceiro_id
 * @property string $razaosocial
 * @property string $nomefantasia
 * @property string $segmento
 * @property float $percent_cash
 * @property string $CEP
 * @property string $endereco_parc
 * @property string|null $complem_parc
 * @property int $municipio_emp
 * @property int $UF_emp
 * @property string $num_ender_emp
 * @property string $bairro_emp
 * @property string $doc_empresa
 * @property string|null $fonefixo_emp
 * @property string $fonecel_emp
 * @property string $email_emp
 * @property string|null $link_instag
 * @property string|null $link_facebook
 * @property string|null $logo_empresa
 * @property string|null $termo_digital
 * @property string $datahoracad_emp
 * @property string $ip_register_emp
 * @property int $user_id_reg_emp
 *
 * @property Parceiros $parceiro
 */
class Empresasconv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresasconv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parceiro_id', 'razaosocial', 'nomefantasia', 'segmento', 'percent_cash', 'CEP', 'endereco_parc', 'municipio_emp', 'UF_emp', 'num_ender_emp', 'bairro_emp', 'doc_empresa', 'fonecel_emp', 'email_emp','termo_digital', 'ip_register_emp', 'user_id_reg_emp'], 'required'],
            [['parceiro_id', 'municipio_emp', 'UF_emp', 'user_id_reg_emp'], 'integer'],
            [['percent_cash'], 'number'],
            [['datahoracad_emp'], 'safe'],
            [['razaosocial', 'nomefantasia', 'segmento', 'link_instag', 'link_facebook'], 'string', 'max' => 100],
            [['CEP', 'num_ender_emp'], 'string', 'max' => 10],
            [['logo_empresa'], 'file', 'extensions' => 'jpg,png,jpeg,gif'],
            [['termo_digital'], 'file', 'extensions' => 'pdf'],
            [['endereco_parc', 'email_emp'], 'string', 'max' => 120],
            [['complem_parc'], 'string', 'max' => 40],
            [['bairro_emp'], 'string', 'max' => 90],
            [['doc_empresa'], 'string', 'max' => 22],
            [['fonefixo_emp'], 'string', 'max' => 14],
            [['fonecel_emp'], 'string', 'max' => 15],
            [['ip_register_emp'], 'string', 'max' => 45],
            [['parceiro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parceiros::className(), 'targetAttribute' => ['parceiro_id' => 'id_parceiro']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_emrpesaconv' => 'ID',
            'parceiro_id' => 'Parceiro',
            'razaosocial' => 'Razao Social',
            'nomefantasia' => 'Nome Fantasia',
            'segmento' => 'Segmento',
            'percent_cash' => 'Percentual',
            'CEP' => 'CEP',
            'endereco_parc' => 'Endereço',
            'complem_parc' => 'Complemento',
            'municipio_emp' => 'Município',
            'UF_emp' => 'UF',
            'num_ender_emp' => 'Núm',
            'bairro_emp' => 'Bairro',
            'doc_empresa' => 'CNPJ',
            'fonefixo_emp' => 'Fone Fixo',
            'fonecel_emp' => 'Fone Celular',
            'email_emp' => 'Email',
            'link_instag' => 'Link Instagram',
            'link_facebook' => 'Link Facebook',
            'logo_empresa' => 'Logo Empresa',
            'termo_digital' => 'Termo Digitalizado',
            'datahoracad_emp' => 'Data hora Cad',
            'ip_register_emp' => 'Ip Registro',
            'user_id_reg_emp' => 'User Registro',
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


    public function getCidades()
    {
    return $this->hasOne(Cidade::className(), ['CT_ID' => 'municipio_emp']);
    }

    public function getEstados()
    {
        return $this->hasOne(Estado::className(), ['UF_ID' => 'UF_emp']);
    }
}
