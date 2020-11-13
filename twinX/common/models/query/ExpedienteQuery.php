<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Expediente]].
 *
 * @see \common\models\Expediente
 */
class ExpedienteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Expediente[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Expediente|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
