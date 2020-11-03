<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Universidad]].
 *
 * @see \common\models\Universidad
 */
class UniversidadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Universidad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Universidad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
