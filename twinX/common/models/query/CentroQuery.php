<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Centro]].
 *
 * @see \common\models\Centro
 */
class CentroQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Centro[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Centro|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
