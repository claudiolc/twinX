<?php
namespace common\models;

use common\models\Convenio;
use common\models\ReqLingConv;
use yii\db\Exception;



class ConvenioForm extends Convenio
{
    public $requisitos = [];
    private $_requisitos;

    public function save($runValidation = true, $attributeNames = null)
    {
        $transaction = \Yii::$app->db->beginTransaction();

        try {
            if (!parent::save($runValidation, $attributeNames)) {
                return false;
            }

            $this->addNewRequisitos();
            $this->deleteOldRequisitos();

            $transaction->commit();

        }

        catch (Exception $e) {
            $transaction->rollBack();

            throw $e;
        }

        return true;
    }

    protected function addNewRequisitos()
    {
        $nuevos = [];

        if ($this->isNewRecord) {
            $nuevos = $this->requisitos;
        }
        else if(!empty($this->requisitos)){
            foreach ($this->requisitos as $requisito) {
                if (!in_array($requisito, $this->_requisitos)) {
                    $nuevos[] = $requisito;
                }
            }
        }

        if(!empty($nuevos)) {
            foreach ($nuevos as $requisito) {
                $relacion = new ReqLingConv();

                $relacion->id_conv = $this->id;
                $relacion->id_comp = $requisito;

                if (!$relacion->save()) {
                    throw new Exception('Error al guardar el requisito lingüístico');
                }
            }
        }
    }

    protected function deleteOldRequisitos()
    {
        foreach ($this->reqLingConvs as $requisito) {
            if (!in_array($requisito->id, $this->requisitos) && $requisito->delete() === false) {
                throw new Exception('Failed to save related records.');
            }
        }
    }

    public function afterFind()
    {
        foreach ($this->reqLingConvs as $requisito) {
            $this->requisitos[] = $requisito->id;
        }

        $this->_requisitos = $this->requisitos;

        parent::afterFind();

    }
}