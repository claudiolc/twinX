<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rel_exp_fav_gestor".
 *
 * @property int $id
 * @property int|null $id_exp
 * @property int|null $id_gestor
 *
 * @property Expediente $exp
 * @property User $gestor
 */
class RelExpFavGestor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_exp_fav_gestor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_exp', 'id_gestor'], 'integer'],
            [['id_exp'], 'exist', 'skipOnError' => true, 'targetClass' => Expediente::className(), 'targetAttribute' => ['id_exp' => 'id']],
            [['id_gestor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_gestor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_exp' => 'Id Exp',
            'id_gestor' => 'Id Gestor',
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
     * @return \common\models\query\RelExpFavGestorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RelExpFavGestorQuery(get_called_class());
    }
}
