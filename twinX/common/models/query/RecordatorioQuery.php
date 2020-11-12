<?php

namespace common\models\query;

use common\models\Recordatorio;
use Yii;

/**
 * This is the ActiveQuery class for [[\common\models\Recordatorio]].
 *
 * @see \common\models\Recordatorio
 */
class RecordatorioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Recordatorio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Recordatorio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function notificaciones($db = null)
    {
        return Recordatorio::find()
            ->where(['id_usr_aviso' => Yii::$app->user->id])
            ->andWhere(['<>', 'completado', '1'])
            ->andWhere(['<', 'deadline', date('yy-m-d H:i')]);
    }
}
