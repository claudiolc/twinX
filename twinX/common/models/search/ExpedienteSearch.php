<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Expediente;

/**
 * ExpedienteSearch represents the model behind the search form of `common\models\Expediente`.
 */
class ExpedienteSearch extends Expediente
{
    public $nombreEstudiante, $convenio, $descripcionTipoExp, $fase, $horaFase;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_ae', 'id_tipo_exp'], 'integer'],
            [['nombreEstudiante', 'convenio', 'descripcionTipoExp', 'fase', 'horaFase'], 'safe'],
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
        $query = Expediente::find();

        // add conditions that should always apply here

        $query->joinWith(['ae.estudiante.usuario', 'ae.estudiante.convenio.codPais', 'tipoExp', 'relExpFases.fase', 'ae.estudiante.convenio.codArea']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nombreEstudiante'] = [
            'asc' => ['user.nombre' => SORT_ASC],
            'desc' => ['user.nombre' => SORT_DESC],
            'default' => SORT_DESC
        ];

        $dataProvider->sort->attributes['convenio'] = [
            'asc' => ['pais.iso' => SORT_ASC],
            'desc' => ['pais.iso' => SORT_DESC],
            'default' => SORT_DESC
        ];

        $dataProvider->sort->attributes['descripcionTipoExp'] = [
            'asc' => ['tipo_expediente.descripcion' => SORT_ASC],
            'desc' => ['tipo_expediente.descripcion' => SORT_DESC],
            'default' => SORT_DESC
        ];

        $dataProvider->sort->attributes['horaFase'] = [
            'asc' => ['rel_exp_fase.timestamp' => SORT_ASC],
            'desc' => ['rel_exp_fase.timestamp' => SORT_DESC],
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
            'expediente.id' => $this->id,
            'id_ae' => $this->id_ae,
            'id_tipo_exp' => $this->id_tipo_exp,
        ]);

        $query->andFilterWhere(['like', 'user.nombre', $this->nombreEstudiante])
            ->andFilterWhere(['like', 'pais.iso', $this->convenio])
            ->orFilterWhere(['like', 'convenio.cod_uni', $this->convenio])
            ->orFilterWhere(['like', 'area.cod_isced', $this->convenio])
            ->andFilterWhere(['like', 'tipo_expediente.descripcion', $this->descripcionTipoExp])
            ->andFilterWhere(['like', 'rel_exp_fase.timestamp', $this->horaFase])
            ->andFilterWhere(['like', 'fase_expediente.descripcion', $this->fase]);



        return $dataProvider;
    }
}
