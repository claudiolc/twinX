<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rel_exp_fase".
 *
 * @property int $id
 * @property int $id_exp
 * @property int $id_fase
 * @property int $id_gestor
 * @property int|null $procesado
 * @property string $timestamp
 * @property string|null $info podría estar en otra tabla
 *
 * @property Expediente $exp
 * @property FaseExpediente $fase
 * @property User $gestor
 */
class RelExpFase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_exp_fase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_exp', 'id_fase', 'id_gestor', 'timestamp'], 'required'],
            [['id_exp', 'id_fase', 'id_gestor', 'procesado'], 'integer'],
            [['timestamp'], 'safe'],
            [['info'], 'string', 'max' => 255],
            [['id_exp'], 'exist', 'skipOnError' => true, 'targetClass' => Expediente::className(), 'targetAttribute' => ['id_exp' => 'id']],
            [['id_fase'], 'exist', 'skipOnError' => true, 'targetClass' => FaseExpediente::className(), 'targetAttribute' => ['id_fase' => 'id']],
            [['id_gestor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_gestor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_exp' => 'Id Exp',
            'id_fase' => 'Id Fase',
            'id_gestor' => 'Id Gestor',
            'procesado' => 'Procesado',
            'timestamp' => 'Timestamp',
            'info' => 'Info',
        ];
    }

    /**
     * Gets query for [[Exp]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ExpedienteQuery
     */
    public function getExp()
    {
        return $this->hasOne(Expediente::className(), ['id' => 'id_exp']);
    }

    /**
     * Gets query for [[Fase]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\FaseExpedienteQuery
     */
    public function getFase()
    {
        return $this->hasOne(FaseExpediente::className(), ['id' => 'id_fase']);
    }

    /**
     * Gets query for [[Gestor]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getGestor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_gestor']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RelExpFaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RelExpFaseQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $this->id_gestor = Yii::$app->user->id;
        $this->timestamp = strtotime('now');

        return parent::save($runValidation, $attributeNames);
    }

}
