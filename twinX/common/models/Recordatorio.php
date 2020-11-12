<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recordatorio".
 *
 * @property int $id
 * @property int $id_creador
 * @property int $id_usr_aviso
 * @property string $timestamp
 * @property string $deadline
 * @property string $titulo
 * @property string|null $descripcion
 * @property int|null $completado
 *
 * @property User $creador
 * @property User $usrAviso
 */
class Recordatorio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recordatorio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_creador', 'id_usr_aviso', 'timestamp', 'deadline', 'titulo'], 'required'],
            [['id_creador', 'id_usr_aviso', 'completado'], 'integer'],
            [['timestamp', 'deadline'], 'safe'],
            [['descripcion'], 'string'],
            [['titulo'], 'string', 'max' => 50],
            [['id_creador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_creador' => 'id']],
            [['id_usr_aviso'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usr_aviso' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_creador' => 'Creador',
            'id_usr_aviso' => 'Usuario a avisar',
            'timestamp' => 'Hora de creación',
            'deadline' => 'Fecha y hora límite',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'completado' => 'Completado',
        ];
    }

    /**
     * Gets query for [[Creador]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreador()
    {
        return $this->hasOne(User::className(), ['id' => 'id_creador']);
    }

    /**
     * Gets query for [[UsrAviso]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUsrAviso()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usr_aviso']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RecordatorioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RecordatorioQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null, $avoidUpdate = false)
    {
        if(!$avoidUpdate){
            $this->id_creador = Yii::$app->user->id;
            $this->timestamp = date('yy-m-d H:i:s');
        }

        return parent::save($runValidation, $attributeNames);
    }

    public function getNombreUsuarioAvisado()
    {
        return $this->usrAviso->getNombreUsername();
    }

}
