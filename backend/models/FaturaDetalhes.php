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
            [['fatura_empresaconv', 'comprarealiz_id', 'id_user_registro'], 'required'],
            [['fatura_empresaconv', 'comprarealiz_id', 'id_user_registro'], 'integer'],             
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
            'id_faturadetail' => 'Fatura Detalhe ID',
            'fatura_empresaconv' => 'Fatura ID',
            'comprarealiz_id' => 'Compra ID',      
            'datahoraregistro' => 'Data/hora Registro',
            'id_user_registro' => 'User Registro',
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

    public function setStatusfaturafat($idfat)
    {
        Yii::$app->db->createCommand()->update('comprasrealiz', ['statuspgto' => 'FAT'], ['id_compras' => $idfat])->execute();
    }

    public function setNovovalorfatura($idfat, $valnfce)
    {
        Yii::$app->db->createCommand()->update('fatura_empresasconv', ['valor_total' => $valnfce], ['idfatura' => $idfat])->execute();
    }

    public function setStatusfaturapend($idfatp)
    {
        Yii::$app->db->createCommand()->update('comprasrealiz', ['statuspgto' => 'PEND'], ['id_compras' => $idfatp])->execute();
    }
}
