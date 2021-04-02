<?php

namespace frontend\models;

use Yii;
use yiibr\brvalidator\CpfValidator;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $celularfone
 * @property string $cpfcnpj
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Condominos[] $condominos
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'condominio_id', 'last_name', 'celularfone', 'cpfcnpj', 'username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'condominio_id','updated_at'], 'integer'],
            [['first_name'], 'string', 'max' => 80],
            [['last_name'], 'string', 'max' => 100],
            [['celularfone'], 'string', 'max' => 15],
	    [['username'], 'unique', 'message' => 'Nome de usuario duplicado'],
	    [['email'], 'unique'], 
	    [['celularfone'],'unique'],
	    [['cpfcnpj'], 'unique'],
	 //   ['username', 'unique', 'message' => 'Usuário {attribute} duplicado. Escolha outro.')],
  	    [['cpfcnpj'],  CpfValidator::className()],
            [['cpfcnpj'], 'string', 'max' => 20],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'celularfone' => 'Celularfone',
            'cpfcnpj' => 'Cpfcnpj',
            'condominio_id' => 'Condomínio',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Condominos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCondominos()
    {
        return $this->hasMany(Condominos::className(), ['user_id' => 'id']);
    }

    public function getCondominio()
    {
        return $this->hasOne(Condominios::className(), ['id_condom' => 'condominio_id']);
    } 
}
