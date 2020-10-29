<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mail_predef".
 *
 * @property int $id
 * @property string $titulo
 * @property string $asunto
 * @property string $cuerpo
 *
 * @property EnvioMailFase[] $envioMailFases
 * @property HistEnvioMailFase[] $histEnvioMailFases
 */
class MailPredef extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_predef';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'asunto', 'cuerpo'], 'required'],
            [['cuerpo'], 'string'],
            [['titulo', 'asunto'], 'string', 'max' => 255],
            [['titulo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'asunto' => 'Asunto',
            'cuerpo' => 'Cuerpo',
        ];
    }

    /**
     * Gets query for [[EnvioMailFases]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EnvioMailFaseQuery
     */
    public function getEnvioMailFases()
    {
        return $this->hasMany(EnvioMailFase::className(), ['id_mail' => 'id']);
    }

    /**
     * Gets query for [[HistEnvioMailFases]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HistEnvioMailFaseQuery
     */
    public function getHistEnvioMailFases()
    {
        return $this->hasMany(HistEnvioMailFase::className(), ['id_mail' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MailPredefQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MailPredefQuery(get_called_class());
    }
}
