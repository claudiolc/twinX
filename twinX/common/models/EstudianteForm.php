<?php
namespace common\models;

use yii\db\Exception;



class EstudianteForm extends Estudiante
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
                if (empty($this->_requisitos) or !in_array($requisito, $this->_requisitos)) {
                    $nuevos[] = $requisito;
                }
            }
        }

        if(!empty($nuevos)) {
            foreach ($nuevos as $requisito) {
                $relacion = new RelClEst();

                $relacion->id_est = $this->id_usuario;
                $relacion->id_cl = $requisito;

                if (!$relacion->save()) {
                    throw new Exception('Error al guardar el requisito lingüístico');
                }
            }
        }
    }

    protected function deleteOldRequisitos()
    {
        //$this->relClEsts obtiene los requisitos del estudiante actual.
        //Si hubiera alguno que se ha eliminado en el Select2 y que por tanto no se ha marcado
        //pero estuviera guardado de antes, se borra

        foreach ($this->relClEsts as $requisito) {
            if (!in_array($requisito->id_cl, $this->requisitos) && $requisito->delete() === false) {
                throw new Exception('Error al eliminar los requisitos antiguos');
            }
        }
    }

    public function afterFind()
    {
        foreach ($this->relClEsts as $requisito) {
            $this->requisitos[] = $requisito->id_cl;
        }

        $this->_requisitos = $this->requisitos;

        parent::afterFind();

    }
}