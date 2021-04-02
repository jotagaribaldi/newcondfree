<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fatura_detalhes".
 *
 * @property int $id_faturadetail
 * @property int $fatura_empresaconv
 * @property int $comprarealiz_id
 * @property float $valor_compra
 * @property float $valor_cashback
 * @property float $valor_desconto_user
 * @property string $datahoraregistro
 * @property int $id_user_registro
 *
 * @property Comprasrealiz $comprarealiz
 * @property FaturaEmpresasconv $faturaEmpresaconv
 */
class FaturaDetalhes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fatura_detalhes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fatura_empresaconv', 'comprarealiz_id', 'valor_compra', 'valor_cashback', 'valor_desconto_user', 'id_user_registro'], 'required'],
            [['fatura_empresaconv', 'comprarealiz_id', 'id_user_registro'], 'integer'],
            [['valor_compra', 'valor_cashback', 'valor_desconto_user'], 'number'],
            [['datahoraregistro'], 'safe'],
            [['comprarealiz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comprasrealiz::className(), 'targetAttribute' => ['comprarealiz_id' => 'id_compras']],
            [['fatura_empresaconv'], 'exist', 'skipOnError' => true, 'targetClass' => FaturaEmpresasconv::className(), 'targetAttribute' => ['fatura_empresaconv' => 'idfatura']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_faturadetail' => 'Id Faturadetail',
            'fatura_empresaconv' => 'Fatura Empresaconv',
            'comprarealiz_id' => 'Comprarealiz ID',
            'valor_compra' => 'Valor Compra',
            'valor_cashback' => 'Valor Cashback',
            'valor_desconto_user' => 'Valor Desconto User',
            'datahoraregistro' => 'Datahoraregistro',
            'id_user_registro' => 'Id User Registro',
        ];
    }

    /**
     * Gets query for [[Comprarealiz]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComprarealiz()
    {
        return $this->hasOne(Comprasrealiz::className(), ['id_compras' => 'comprarealiz_id']);
    }

    /**
     * Gets query for [[FaturaEmpresaconv]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaturaEmpresaconv()
    {
        return $this->hasOne(FaturaEmpresasconv::className(), ['idfatura' => 'fatura_empresaconv']);
    }
}
