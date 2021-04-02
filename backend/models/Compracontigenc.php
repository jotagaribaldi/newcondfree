<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "compracontigenc".
 *
 * @property int $id_comprascont
 * @property int $condomino_idcont
 * @property int $comprasrealiz_id
 * @property string $cnpj_empresacont
 * @property string $nfnum_cont
 * @property string $nfce_confirmada
 * @property string $urlnfcesefazcont
 * @property string $num_serie
 * @property string $modelo_nfce
 * @property string $anomesnfce
 * @property string $data_leitura_cf
 * @property string $codigo_chavenfce
 * @property string|null $foto_comprovcomp
 * @property int|null $user_id_confirma
 *
 * @property Comprasrealiz $comprasrealiz
 * @property Condominos $condominoIdcont
 */
class Compracontigenc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compracontigenc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['condomino_idcont', 'comprasrealiz_id', 'cnpj_empresacont', 'nfnum_cont', 'urlnfcesefazcont', 'num_serie', 'modelo_nfce', 'anomesnfce', 'codigo_chavenfce'], 'required'],
            [['condomino_idcont', 'comprasrealiz_id', 'user_id_confirma'], 'integer'],
            [['nfce_confirmada'], 'string'],
            [['data_leitura_cf'], 'safe'],
            [['cnpj_empresacont'], 'string', 'max' => 30],
            [['nfnum_cont'], 'string', 'max' => 15],
            [['urlnfcesefazcont'], 'string', 'max' => 1500],
            [['num_serie', 'modelo_nfce', 'anomesnfce'], 'string', 'max' => 5],
            [['codigo_chavenfce'], 'string', 'max' => 255],
            [['foto_comprovcomp'], 'string', 'max' => 200],
            [['comprasrealiz_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comprasrealiz::className(), 'targetAttribute' => ['comprasrealiz_id' => 'id_compras']],
            [['condomino_idcont'], 'exist', 'skipOnError' => true, 'targetClass' => Condominos::className(), 'targetAttribute' => ['condomino_idcont' => 'id_morad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_comprascont' => 'ID',
            'condomino_idcont' => 'Condômino',
            'comprasrealiz_id' => 'Compra ID',
            'cnpj_empresacont' => 'CNPJ Empresa',
            'nfnum_cont' => 'Núm NF',
            'nfce_confirmada' => 'Status',
            'urlnfcesefazcont' => 'Download NF',
            'num_serie' => 'Núm Série',
            'modelo_nfce' => 'Modelo NF',
            'anomesnfce' => 'Ano/Mẽs',
            'data_leitura_cf' => 'Data Leitura',
            'codigo_chavenfce' => 'Código Chave',
            'foto_comprovcomp' => 'Img Comprov',
            'user_id_confirma' => 'Usuário Confirm',
        ];
    }

    /**
     * Gets query for [[Comprasrealiz]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComprasrealiz()
    {
        return $this->hasOne(Comprasrealiz::className(), ['id_compras' => 'comprasrealiz_id']);
    }

    /**
     * Gets query for [[CondominoIdcont]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCondominoIdcont()
    {
        return $this->hasOne(Condominos::className(), ['id_morad' => 'condomino_idcont']);
    }
}
