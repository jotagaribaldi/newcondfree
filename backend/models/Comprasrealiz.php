<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comprasrealiz".
 *
 * @property int $id_compras
 * @property int $condomino_id
 * @property string $cnpj_empresaconv
 * @property string $nfnum
 * @property string $compravalida
 * @property string|null $descr_servmercad
 * @property string|null $data_horario
 * @property float|null $total_pago
 * @property string $urlnfsefaz
 * @property float|null $valretornocashback
 * @property string|null $forma_pagto
 * @property string $dat_hora_leitura
 * @property string|null $obsleituras
 * @property string $statuspgto
 *
 * @property Compracontigenc[] $compracontigencs
 * @property ComprasEnvioManual[] $comprasEnvioManuals
 * @property Condominos $condomino
 */
class Comprasrealiz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comprasrealiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['condomino_id', 'cnpj_empresaconv', 'nfnum', 'total_pago', 'urlnfsefaz'], 'required'],
            [['condomino_id'], 'integer'],
            [['compravalida', 'statuspgto'], 'string'],
            [['total_pago', 'valretornocashback'], 'number'],
            [['dat_hora_leitura'], 'safe'],
            [['cnpj_empresaconv', 'data_horario'], 'string', 'max' => 30],
            [['nfnum'], 'string', 'min'=>9, 'max' => 9],
            [['descr_servmercad'], 'string', 'max' => 220],
            [['urlnfsefaz'], 'string', 'max' => 500],
            [['forma_pagto'], 'string', 'max' => 45],
            [['obsleituras'], 'string', 'max' => 200],
            [['condomino_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condominos::className(), 'targetAttribute' => ['condomino_id' => 'id_morad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_compras' => 'ID',
            'condomino_id' => 'Condômino',
            'cnpj_empresaconv' => 'Empresa parceira',
            'nfnum' => 'NF Num',
            'compravalida' => 'Status Compra',
            'descr_servmercad' => 'Descr',
            'data_horario' => 'Data Horário',
            'total_pago' => 'Valor Nota',
            'urlnfsefaz' => 'Url Sefaz',
            'valretornocashback' => 'Cashback',
            'forma_pagto' => 'Forma Pagto',
            'dat_hora_leitura' => 'Data/Hora Leitura',
            'obsleituras' => 'Obs',
            'statuspgto' => 'Status Pgto',
        ];
    }

    /**
     * Gets query for [[Compracontigencs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompracontigencs()
    {
        return $this->hasMany(Compracontigenc::className(), ['comprasrealiz_id' => 'id_compras']);
    }

    /**
     * Gets query for [[ComprasEnvioManuals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComprasEnvioManuals()
    {
        return $this->hasMany(ComprasEnvioManual::className(), ['comprasrealiz_id_manu' => 'id_compras']);
    }

    /**
     * Gets query for [[Condomino]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCondomino()
    {
        return $this->hasOne(Condominos::className(), ['id_morad' => 'condomino_id']);
    }


    public function getEmpresasconv()
    {
        return $this->hasOne(Empresasconv::className(), ['doc_empresa' => 'cnpj_empresaconv']);
    }

    public static function getTotalnf($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total;
    }


    public static function getTotalcb($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total;
    }

    public static function getTotalret($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total*0.9;
    }

      public static function getTotalcomis($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider as $item) {
            $total += $item[$fieldName];
        }

        return $total*0.1;
    }

  /*  public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'condomino.user_id']);
    } 

       public function getCondominio()
    {
        return $this->hasOne(Condominios::className(), ['id_condom' => 'user.condominio_id']);
    } */
    
    public function checkDuplicate($nfv, $cnpjv) 
    {
        $querydupl = Comprasrealiz::find()->where(['nfnum' => $nfv])->andWhere(['cnpj_empresaconv' => $cnpjv])->one();
        return $querydupl;        
    }
}
