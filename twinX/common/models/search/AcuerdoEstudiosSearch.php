<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AcuerdoEstudios;

/**
 * AcuerdoEstudiosSearch represents the model behind the search form of `common\models\AcuerdoEstudios`.
 */
class AcuerdoEstudiosSearch extends AcuerdoEstudios
{
    public $convenio, $nombreEstudiante, $tipoMovilidad, $tutor, $curso;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_estudiante', 'id_tutor', 'fase', 'id_curso', 'n_solicitud_RRII'], 'integer'],
            [['timestamp_creacion', 'periodo', 'necesidades', 'begin_movilidad', 'end_movilidad', 'timestamp_nominacion', 'link_documentacion', 'convocatoria', 'estado_validacion'], 'safe'],
            [['convenio', 'nombreEstudiante', 'tipoMovilidad', 'tutor'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AcuerdoEstudios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith(['estudiante', 'estudiante.convenio', 'estudiante.usuario', 'curso']);

        $dataProvider->sort->attributes['nombreEstudiante'] = [
            'asc' => ['estudiante.nombreEstudiante' => SORT_ASC],
            'desc' => ['estudiante.nombreEstudiante' => SORT_DESC],
            'default' => SORT_DESC
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_estudiante' => $this->id_estudiante,
            'id_tutor' => $this->id_tutor,
            'timestamp_creacion' => $this->timestamp_creacion,
            'fase' => $this->fase,
            'id_curso' => $this->id_curso,
            'begin_movilidad' => $this->begin_movilidad,
            'end_movilidad' => $this->end_movilidad,
            'timestamp_nominacion' => $this->timestamp_nominacion,
            'n_solicitud_RRII' => $this->n_solicitud_RRII,
        ]);

        $query->andFilterWhere(['like', 'periodo', $this->periodo])
            ->andFilterWhere(['like', 'necesidades', $this->necesidades])
            ->andFilterWhere(['like', 'link_documentacion', $this->link_documentacion])
            ->andFilterWhere(['like', 'convocatoria', $this->convocatoria])
            ->andFilterWhere(['like', 'estado_validacion', $this->estado_validacion]);

        return $dataProvider;
    }
}
