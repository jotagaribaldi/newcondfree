<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cidade".
 *
 * @property int $CT_ID
 * @property string|null $CT_NOME
 * @property int|null $CT_UF
 * @property int|null $CT_IBGE
 */
class Cidade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cidade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CT_UF', 'CT_IBGE'], 'integer'],
            [['CT_NOME'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CT_ID' => 'Ct ID',
            'CT_NOME' => 'Ct Nome',
            'CT_UF' => 'Ct Uf',
            'CT_IBGE' => 'Ct Ibge',
        ];
    }

    public function getCidades()
    {
	return self::find()->select(['CT_NOME','CT_ID'])->indexBy('CT_ID')->collumn();

    }
}
