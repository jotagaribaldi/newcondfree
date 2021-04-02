<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "unidadesimov".
 *
 * @property int $id_imov
 * @property int $condominio_id
 * @property int $quadra_bloco_id
 * @property string $nome_unidade
 * @property int $proprietario_id
 * @property int|null $locatario_id
 * @property string $data_cad_und
 * @property string $ip_regist_und
 * @property int $user_cad_und
 *
 * @property Quadrablocos $quadraBloco
 */
class Unidadesimov extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidadesimov';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['condominio_id', 'quadra_bloco_id', 'nome_unidade', 'proprietario_id','tipo_unidade', 'ip_regist_und', 'user_cad_und'], 'required'],
            [['condominio_id', 'quadra_bloco_id', 'proprietario_id', 'locatario_id', 'user_cad_und'], 'integer'],
            [['data_cad_und'], 'safe'],
            [['nome_unidade'], 'string', 'max' => 15],
            [['ip_regist_und'], 'string', 'max' => 24],
	    [['tipo_unidade'], 'string', 'max' => 1],
            [['quadra_bloco_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quadrablocos::className(), 'targetAttribute' => ['quadra_bloco_id' => 'id_qdblo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_imov' => 'ID',
            'condominio_id' => 'Condomínio',
            'quadra_bloco_id' => 'Quadra/Bloco',
            'nome_unidade' => 'Unidade',
            'proprietario_id' => 'Proprietário',
            'locatario_id' => 'Locatário',
            'data_cad_und' => 'Data Cad Und',
	        'tipo_unidade' => 'Tipo',
            'ip_regist_und' => 'IP Regist',
            'user_cad_und' => 'Usuário Cadastro Und',
        ];
    }

    /**
     * Gets query for [[QuadraBloco]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuadraBloco()
    {
        return $this->hasOne(Quadrablocos::className(), ['id_qdblo' => 'quadra_bloco_id']);
    }


    public function getCondominoUnid()
    {
        return $this->hasOne(Condominos::className(), ['id_morad' => 'proprietario_id']);
    }
    
    public function getCondominoUnidlocat()
    {
        return $this->hasOne(Condominos::className(), ['id_morad' => 'locatario_id']);
    }
}
