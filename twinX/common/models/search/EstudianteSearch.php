<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Estudiante;

/**
 * EstudianteSearch represents the model behind the search form of `common\models\Estudiante`.
 */
class EstudianteSearch extends Estudiante
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_convenio', 'id_titulacion', 'telefono2', 'cesion_datos', 'beca_mec'], 'integer'],
            [['dni', 'email_go_ugr', 'f_nacimiento', 'tipo_estudiante'], 'safe'],
            [['nota_expediente'], 'number'],
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
        $query = Estudiante::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_usuario' => $this->id_usuario,
            'id_convenio' => $this->id_convenio,
            'id_titulacion' => $this->id_titulacion,
            'telefono2' => $this->telefono2,
            'f_nacimiento' => $this->f_nacimiento,
            'cesion_datos' => $this->cesion_datos,
            'nota_expediente' => $this->nota_expediente,
            'beca_mec' => $this->beca_mec,
        ]);

        $query->andFilterWhere(['like', 'dni', $this->dni])
            ->andFilterWhere(['like', 'email_go_ugr', $this->email_go_ugr])
            ->andFilterWhere(['like', 'tipo_estudiante', $this->tipo_estudiante]);

        return $dataProvider;
    }
}
