<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "envio_mail_fase".
 *
 * @property int $id
 * @property int $id_mail
 * @property int $id_fase
 * @property string $cargo
 *
 * @property MailPredef $mail
 * @property FaseExpediente $fase
 */
class EnvioMailFase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'envio_mail_fase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mail', 'id_fase', 'cargo'], 'required'],
            [['id_mail', 'id_fase'], 'integer'],
            [['cargo'], 'string'],
            [['id_mail'], 'exist', 'skipOnError' => true, 'targetClass' => MailPredef::className(), 'targetAttribute' => ['id_mail' => 'id']],
            [['id_fase'], 'exist', 'skipOnError' => true, 'targetClass' => FaseExpediente::className(), 'targetAttribute' => ['id_fase' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_mail' => 'Id Mail',
            'id_fase' => 'Id Fase',
            'cargo' => 'Cargo',
        ];
    }

    /**
     * Gets query for [[Mail]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MailPredefQuery
     */
    public function getMail()
    {
        return $this->hasOne(MailPredef::className(), ['id' => 'id_mail']);
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
     * {@inheritdoc}
     * @return \common\models\query\EnvioMailFaseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EnvioMailFaseQuery(get_called_class());
    }
}
