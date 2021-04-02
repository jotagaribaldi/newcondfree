<?php

namespace backend\models;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "sindicos".
 *
 * @property int $id_sindico
 * @property string $nome_sindico
 * @property int $condominio_id
 * @property string $inicio_mandato
 * @property string $fim_mandato
 * @property string $sindico_ativo
 * @property string $sindico_profi
 * @property string $celular_sindico
 * @property string $sexo
 * @property string|null $data_nasci_sindico
 * @property string $cep_sindico
 * @property string $endereco_sindico
 * @property string $num_ender_sindico
 * @property string $comple_ender_sind
 * @property string $bairro_sindico
 * @property int $uf_sindi
 * @property int $cidade_sindico
 * @property string $ip_reg_sindico
 * @property int $user_id_cadsindico
 * @property string $datacad_sindico
 *
 * @property Condominios $condominio
 */
class Sindicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sindicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_sindico', 'condominio_id', 'inicio_mandato', 'fim_mandato', 'sindico_ativo', 'sindico_profi', 'celular_sindico', 'sexo', 'cep_sindico', 'endereco_sindico', 'num_ender_sindico', 'usersind_id','comple_ender_sind', 'bairro_sindico', 'uf_sindi', 'cidade_sindico', 'ip_reg_sindico', 'user_id_cadsindico'], 'required'],
            [['condominio_id', 'uf_sindi', 'cidade_sindico', 'user_id_cadsindico', 'usersind_id'], 'integer'],
            [['inicio_mandato', 'fim_mandato', 'data_nasci_sindico', 'datacad_sindico'], 'safe'],
            [['sindico_ativo', 'sindico_profi', 'sexo'], 'string'],
            [['nome_sindico'], 'string', 'max' => 100],
            [['celular_sindico'], 'string', 'max' => 15],
            [['cep_sindico'], 'string', 'max' => 16],
            [['endereco_sindico'], 'string', 'max' => 90],
            [['num_ender_sindico'], 'string', 'max' => 10],
            [['comple_ender_sind'], 'string', 'max' => 80],
            [['bairro_sindico'], 'string', 'max' => 50],
            [['ip_reg_sindico'], 'string', 'max' => 20],
            [['condominio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condominios::className(), 'targetAttribute' => ['condominio_id' => 'id_condom']],
            [['usersind_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usersind_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sindico' => 'ID',
            'nome_sindico' => 'Nome Sindico',
            'condominio_id' => 'Condominio',
            'usersind_id'   => 'Usuário',
            'inicio_mandato' => 'Inicio Mandato',
            'fim_mandato' => 'Fim Mandato',
            'sindico_ativo' => 'Sindico Ativo',
            'sindico_profi' => 'Sindico Profissional?',
            'celular_sindico' => 'Celular Sindico',
            'sexo' => 'Sexo',
            'data_nasci_sindico' => 'Data Nascimento',
            'cep_sindico' => 'CEP',
            'endereco_sindico' => 'Endereço',
            'num_ender_sindico' => 'Núm',
            'comple_ender_sind' => 'Complemento',
            'bairro_sindico' => 'Bairro',
            'uf_sindi' => 'UF',
            'cidade_sindico' => 'Cidade',
            'ip_reg_sindico' => 'IP Registro',
            'user_id_cadsindico' => 'Usuário Cadastra',
            'datacad_sindico' => 'Data Hora Cadastro',
        ];
    }

    public function behaviors()
    {
        return [
            'inicio_mandato' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'inicio_mandato',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'inicio_mandato',
                ],
                'value' => function ($event) {
                    return date('Y-m-d', strtotime(str_replace("/","-",$this->inicio_mandato)));
                },
            ],
            'fim_mandato' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'fim_mandato',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'fim_mandato',
                ],
                'value' => function ($event) {
                    return ($this->fim_mandato === '') ? NULL : date('Y-m-d', strtotime(str_replace("/","-",$this->fim_mandato))) ;
                },
            ],
	    'data_nasci_sindico' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'data_nasci_sindico',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'data_nasci_sindico',
                ],
                'value' => function ($event) {
                    return ($this->data_nasci_sindico === '') ? NULL : date('Y-m-d', strtotime(str_replace("/","-",$this->data_nasci_sindico))) ;
                },
            ],

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

    public function getCidades()
    {
    return $this->hasOne(Cidade::className(), ['CT_ID' => 'cidade_sindico']);
    }

    public function getEstados()
    {
        return $this->hasOne(Estado::className(), ['UF_ID' => 'uf_sindi']);
    }

     public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'usersind_id']);
    }

}
