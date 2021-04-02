<?php

//namespace app\models;
namespace frontend\models;

use Yii;

/**
 * This is the model class for table "compras_envio_manual".
 *
 * @property int $id_compramanu
 * @property int $condomino_id_manu
 * @property int $comprasrealiz_id_manu
 * @property string $cnpj_empresaconv_manu
 * @property int $nfnum_manu
 * @property string $compravalida_manu
 * @property string $imagem_nfce
 * @property string $data_horaenvio
 * @property float $valor_totalnota
 *
 * @property Comprasrealiz $comprasrealizIdManu
 * @property Condominos $condominoIdManu
 */
class ComprasEnvioManual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compras_envio_manual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['condomino_id_manu', 'comprasrealiz_id_manu', 'cnpj_empresaconv_manu', 'nfnum_manu', 'compravalida_manu', 'imagem_nfce', 'valor_totalnota'], 'required'],
            [['condomino_id_manu', 'comprasrealiz_id_manu', 'nfnum_manu'], 'integer'],
            [['compravalida_manu'], 'string'],
            [['data_horaenvio'], 'safe'],
            [['valor_totalnota'], 'number'],
            [['cnpj_empresaconv_manu'], 'string', 'max' => 30],
            [['imagem_nfce'], 'string', 'max' => 220],
            [['comprasrealiz_id_manu'], 'exist', 'skipOnError' => true, 'targetClass' => Comprasrealiz::className(), 'targetAttribute' => ['comprasrealiz_id_manu' => 'id_compras']],
            [['condomino_id_manu'], 'exist', 'skipOnError' => true, 'targetClass' => Condominos::className(), 'targetAttribute' => ['condomino_id_manu' => 'id_morad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_compramanu' => 'Id Compramanu',
            'condomino_id_manu' => 'Condomino Id Manu',
            'comprasrealiz_id_manu' => 'Comprasrealiz Id Manu',
            'cnpj_empresaconv_manu' => 'Cnpj Empresaconv Manu',
            'nfnum_manu' => 'Nfnum Manu',
            'compravalida_manu' => 'Compravalida Manu',
            'imagem_nfce' => 'Imagem Nfce',
            'data_horaenvio' => 'Data Horaenvio',
            'valor_totalnota' => 'Valor Totalnota',
        ];
    }

    /**
     * Gets query for [[ComprasrealizIdManu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComprasrealizIdManu()
    {
        return $this->hasOne(Comprasrealiz::className(), ['id_compras' => 'comprasrealiz_id_manu']);
    }

    /**
     * Gets query for [[CondominoIdManu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCondominoIdManu()
    {
        return $this->hasOne(Condominos::className(), ['id_morad' => 'condomino_id_manu']);
    }
}
