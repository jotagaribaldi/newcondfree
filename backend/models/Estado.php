<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property int $UF_ID
 * @property string|null $UF_NOME
 * @property string|null $UF_UF
 * @property int|null $UF_IBGE
 * @property int|null $UF_SL
 * @property string|null $UF_DDD
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UF_IBGE', 'UF_SL'], 'integer'],
            [['UF_NOME'], 'string', 'max' => 75],
            [['UF_UF'], 'string', 'max' => 2],
            [['UF_DDD'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UF_ID' => 'Uf ID',
            'UF_NOME' => 'Uf Nome',
            'UF_UF' => 'Uf Uf',
            'UF_IBGE' => 'Uf Ibge',
            'UF_SL' => 'Uf Sl',
            'UF_DDD' => 'Uf Ddd',
        ];
    }

    public function getEstados()
    {
	return self::find()->select(['UF_UF','UF_ID'])->indexBy('UF_ID')->column();
    }
}
