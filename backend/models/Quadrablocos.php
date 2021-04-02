<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "quadrablocos".
 *
 * @property int $id_qdblo
 * @property int $condominio_id
 * @property string $descricao_qdblo
 * @property int $user_id_regist_qd
 * @property string $ip_regist_qd
 * @property string $datahoracad_qd
 *
 * @property Condominios $condominio
 */
class Quadrablocos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quadrablocos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['condominio_id', 'descricao_qdblo', 'user_id_regist_qd', 'ip_regist_qd'], 'required'],
            [['condominio_id', 'user_id_regist_qd'], 'integer'],
            [['datahoracad_qd'], 'safe'],
            [['descricao_qdblo'], 'string', 'max' => 50],
            [['ip_regist_qd'], 'string', 'max' => 20],
            [['condominio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condominios::className(), 'targetAttribute' => ['condominio_id' => 'id_condom']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_qdblo' => 'ID',
            'condominio_id' => 'Condomínio',
            'descricao_qdblo' => 'Descrição',
            'user_id_regist_qd' => 'Usuário Cad',
            'ip_regist_qd' => 'IP Reg Cad',
            'datahoracad_qd' => 'Data/Hora Cad',
        ];
    }

    /**
     * Gets query for [[Condominio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCondominio()
    {
        return $this->hasOne(Condominios::className(), ['id_condom' => 'condominio_id']);
    }

    
}
