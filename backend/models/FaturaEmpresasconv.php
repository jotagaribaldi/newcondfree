<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fatura_empresasconv".
 *
 * @property int $idfatura
 * @property int $empresaconv_id
 * @property string|null $data_fechamentofat
 * @property float|null $valor_total
 * @property string $status_fatura
 * @property string $datahora_abert_fatura
 * @property string|null $datapagtofat
 * @property string $ip_cad_fatura
 * @property int $user_cad_fatura
 *
 * @property Empresasconv $empresaconv
 * @property FaturaDetalhes[] $faturaDetalhes
 */
class FaturaEmpresasconv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fatura_empresasconv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empresaconv_id', 'ip_cad_fatura', 'user_cad_fatura', 'id_boletogerado'], 'required'],
            [['empresaconv_id', 'user_cad_fatura'], 'integer'],
            [['data_fechamentofat', 'datahora_abert_fatura', 'datapagtofat'], 'safe'],
            [['valor_total'], 'number'],
            [['status_fatura'], 'string'],
            [['id_boletogerado'], 'string', 'max' => 12],
            [['ip_cad_fatura'], 'string', 'max' => 30],
            [['empresaconv_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresasconv::className(), 'targetAttribute' => ['empresaconv_id' => 'id_emrpesaconv']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idfatura' => 'ID Fatura',
            'empresaconv_id' => 'Empresa Conveniada',
            'data_fechamentofat' => 'Data Fecha Fatura',
            'valor_total' => 'Valor Total',
            'status_fatura' => 'Status Fatura',
            'id_boletogerado' => 'ID Boleto Gerado',
            'datahora_abert_fatura' => 'Data Abert Fatura',
            'datapagtofat' => 'Data Pagto Fatura',
            'ip_cad_fatura' => 'Ip Cad Fatura',
            'user_cad_fatura' => 'User Cad Fatura',
        ];
    }

    /**
     * Gets query for [[Empresaconv]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaconv()
    {
        return $this->hasOne(Empresasconv::className(), ['id_emrpesaconv' => 'empresaconv_id']);
    }

    /**
     * Gets query for [[FaturaDetalhes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturaDetalhes()
    {
        return $this->hasMany(FaturaDetalhes::className(), ['fatura_empresaconv' => 'idfatura']);
    }
}
