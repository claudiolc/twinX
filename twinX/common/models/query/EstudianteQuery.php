<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Estudiante]].
 *
 * @see \common\models\Estudiante
 */
class EstudianteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Estudiante[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Estudiante|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
