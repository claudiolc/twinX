<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\CompetenciaLing]].
 *
 * @see \common\models\CompetenciaLing
 */
class CompetenciaLingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\CompetenciaLing[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\CompetenciaLing|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
