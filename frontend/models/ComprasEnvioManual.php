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
            'id_compramanu' => 'ID',
            'condomino_id_manu' => 'Condomino',
            'comprasrealiz_id_manu' => 'Compras ID',
            'cnpj_empresaconv_manu' => 'CNPJ Empresa',
            'nfnum_manu' => 'NF Num',
            'compravalida_manu' => 'Compra Valida?',
            'imagem_nfce' => 'Imagem Nfce',
            'data_horaenvio' => 'Data Hora Envio',
            'valor_totalnota' => 'Valor Nota',
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
