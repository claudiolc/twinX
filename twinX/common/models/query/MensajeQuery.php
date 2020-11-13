<?php

namespace common\models\query;

use common\models\Mensaje;

/**
 * This is the ActiveQuery class for [[\common\models\Mensaje]].
 *
 * @see \common\models\Mensaje
 */
class MensajeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Mensaje[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Mensaje|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function noLeidos()
    {
        return $this->where(['id_receptor' => \Yii::$app->user->id, 'leido' => '0']);
    }
}
