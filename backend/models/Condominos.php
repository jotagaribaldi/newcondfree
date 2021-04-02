<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "condominos".
 *
 * @property int $id_morad
 * @property int $user_id
 * @property int $condominio_id
 * @property int $quadra_id
 * @property int $imovel_id
 * @property string $morador_status
 * @property string $data_cad_cond
 * @property int $user_cad_id_mor
 * @property string $ip_cad_mor_reg
 *
 * @property User $user
 */
class Condominos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'condominos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_cad_id_mor', 'ip_cad_mor_reg', 'titu_depend','UIDFireb'], 'required'],
            [['user_id', 'user_cad_id_mor'], 'integer'],
            [['morador_status', 'confirmado', 'titu_depend','UIDFireb'], 'string'],
            [['data_cad_cond'], 'safe'],
            [['ip_cad_mor_reg'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_morad' => 'ID',
            'user_id' => 'Login',
            'morador_status' => 'Status',
            'confirmado'  =>  'Confirm.?',
            'titu_depend' => 'Titular?',
            'data_cad_cond' => 'Data Cadastro',
            'UIDFireb'	=> 'UID Firebase',
            'user_cad_id_mor' => 'Usuário Cad',
            'ip_cad_mor_reg' => 'IP Cad Reg',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

  
    /* public function getCondominios()
    {
        return $this->hasOne(Condominios::className(), ['id_condom' => 'condominio_id']);
    } */

    public function Saldocbmes($usrid,$mesano)
    {
        $sql = "SELECT sum(valretornocashback) as acumulcb, SUBSTRING(data_horario, 4,7) AS mesano FROM `comprasrealiz` where condomino_id = ".$usrid." AND compravalida = 'CONF' AND SUBSTRING(data_horario, 4,7) = '".$mesano."' GROUP BY mesano";
                        
        $command = Yii::$app->db->createCommand($sql);
        $sum = $command->queryOne();    
        return $sum;    
    }
  
}
