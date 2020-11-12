<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mensaje".
 *
 * @property int $id
 * @property string $timestamp
 * @property int $id_emisor
 * @property int $id_receptor
 * @property int|null $leido
 * @property string $etiqueta
 * @property string|null $asunto
 * @property string $cuerpo
 *
 * @property User $emisor
 * @property User $receptor
 */
class Mensaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mensaje';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timestamp', 'id_emisor', 'id_receptor', 'cuerpo'], 'required'],
            [['timestamp'], 'safe'],
            [['id_emisor', 'id_receptor', 'leido'], 'integer'],
            [['etiqueta', 'cuerpo'], 'string'],
            [['asunto'], 'string', 'max' => 255],
            [['id_emisor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_emisor' => 'id']],
            [['id_receptor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_receptor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'timestamp' => 'Fecha',
            'id_emisor' => 'Emisor',
            'id_receptor' => 'Destinatario',
            'leido' => 'Leído',
            'etiqueta' => 'Etiqueta',
            'asunto' => 'Asunto',
            'cuerpo' => 'Cuerpo',
        ];
    }

    /**
     * Gets query for [[Emisor]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getEmisor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_emisor']);
    }

    /**
     * Gets query for [[Receptor]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getReceptor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_receptor']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MensajeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MensajeQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null, $avoidUpdate = false)
    {
        if(!$avoidUpdate) {
            $this->timestamp = date('yy-m-d H:i:s');
            $this->id_emisor = Yii::$app->user->id;
        }

        return parent::save($runValidation, $attributeNames);
    }

    public function getNombreEmisor()
    {
        return $this->emisor->nombre;
    }

    public function getNombreReceptor()
    {
        return $this->receptor->nombre;
    }
}
