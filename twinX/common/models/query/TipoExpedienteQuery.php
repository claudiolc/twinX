<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\TipoExpediente]].
 *
 * @see \common\models\TipoExpediente
 */
class TipoExpedienteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\TipoExpediente[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\TipoExpediente|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
