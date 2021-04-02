<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comprasrealiz".
 *
 * @property int $id_compras
 * @property int $condomino_id
 * @property string $cnpj_empresaconv
 * @property string $descr_servmercad
 * @property string $data_horario
 * @property float $total_pago
 * @property string $forma_pagto
 * @property string $dat_hora_leitura
 *
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
            [['condomino_id', 'cnpj_empresaconv','nfnum',  'urlnfsefaz' ], 'required'],
            [['condomino_id'], 'integer'],
            [['data_horario', 'dat_hora_leitura', 'descr_servmercad', 'compravalida', 'forma_pagto'], 'safe'],
            [['total_pago','valretornocashback'], 'number'],
            [['cnpj_empresaconv'], 'string', 'max' => 30],
            [['nfnum'], 'string', 'max' => 12],
            [['urlnfsefaz'], 'string', 'max' => 1500],
            [['descr_servmercad','obsleituras'], 'string', 'max' => 220],
            [['forma_pagto'], 'string', 'max' => 45],
            [['compravalida'], 'string', 'max' => 12],
            [['condomino_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condominos::className(), 'targetAttribute' => ['condomino_id' => 'id_morad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_compras' => 'ID Compra',
            'condomino_id' => 'Condomino',
            'cnpj_empresaconv' => 'CNPJ Empresa',
            'descr_servmercad' => 'Prod ou Serv',
            'nfnum' => 'N.º Nota',
            'urlnfsefaz'  => 'Download NF',
            'compravalida' => 'Status Valida',
            'data_horario' => 'Data NF',
            'total_pago' => 'Valor NF',
            'valretornocashback' => 'Valor Cashback',
            'forma_pagto' => 'Forma Pagto',
            'dat_hora_leitura' => 'Data Hora Leitura',
            'obsleituras' => 'Obs',
        ];
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


    public function getEmpresasconv($cnpjp)
    {
        // return $this->hasOne(Empresasconv::className(), ['cnpj_empresaconv' => 'doc_empresa']);
        return Empresasconv::find()->select(['nomefantasia', 'percent_cash'])->where(['doc_empresa' => $cnpjp])->andWhere(['status' => 'A'])->one();
    }

    public function findCondomino($idusr)
    {
        $condominoid = Condominos::findOne(['user_id' => $idusr]);
        return $condominoid;
    }

    public function formatcpfcnpj($doc)
    {
        $doc = preg_replace("/[^0-9]/", "", $doc);
        $qtd = strlen($doc);
 
        if($qtd >= 11) {
 
            if($qtd === 11 ) {
 
                $docFormatado = substr($doc, 0, 3) . '.' .
                                substr($doc, 3, 3) . '.' .
                                substr($doc, 6, 3) . '.' .
                                substr($doc, 9, 2);
            } else {
                $docFormatado = substr($doc, 0, 2) . '.' .
                                substr($doc, 2, 3) . '.' .
                                substr($doc, 5, 3) . '/' .
                                substr($doc, 8, 4) . '-' .
                                substr($doc, -2);
            }
 
            return $docFormatado;
 
        } else {
            return 'CNPJ inválido';
        }
    }

    public static function getSomaTotal($provider, $columnName)
    {
        $total = 0;
        foreach ($provider as $item) {
          $total += $item[$columnName];
      }
      return $total;  
    }
}
