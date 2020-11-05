<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Convenio;

/**
 * ConvenioSearch represents the model behind the search form of `common\models\Convenio`.
 */
class ConvenioSearch extends Convenio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_admon_out', 'id_tutor', 'id_curso_creacion', 'creado_por', 'num_becas_in', 'num_becas_out', 'meses_in', 'meses_out', 'anno_inicio', 'anno_fin', 'nominacion_online', 'movilidad_pdi', 'movilidad_pas'], 'integer'],
            [['cod_area', 'cod_uni', 'cod_pais', 'anotaciones', 'req_titulacion', 'req_curso', 'link_nom_online', 'info_nom_online', 'link_documentacion', 'tipo_movilidad', 'user_online', 'password_online', 'notas_online', 'fecha_online', 'info_tor', 'observ_discapacidad', 'observ_req_ling', 'begin_nom_1s', 'end_nom_1s', 'begin_nom_2s', 'end_nom_2s', 'begin_app_1s', 'end_app_1s', 'begin_app_2s', 'end_app_2s', 'begin_mov_1s', 'end_mov_1s', 'begin_mov_2s', 'end_mov_2s', 'memo_grading', 'memo_visado', 'memo_seguro', 'memo_alojamiento'], 'safe'],
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
        $query = Convenio::find();

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
            'id' => $this->id,
            'id_admon_out' => $this->id_admon_out,
            'id_tutor' => $this->id_tutor,
            'id_curso_creacion' => $this->id_curso_creacion,
            'creado_por' => $this->creado_por,
            'num_becas_in' => $this->num_becas_in,
            'num_becas_out' => $this->num_becas_out,
            'meses_in' => $this->meses_in,
            'meses_out' => $this->meses_out,
            'anno_inicio' => $this->anno_inicio,
            'anno_fin' => $this->anno_fin,
            'nominacion_online' => $this->nominacion_online,
            'movilidad_pdi' => $this->movilidad_pdi,
            'movilidad_pas' => $this->movilidad_pas,
            'fecha_online' => $this->fecha_online,
            'begin_nom_1s' => $this->begin_nom_1s,
            'end_nom_1s' => $this->end_nom_1s,
            'begin_nom_2s' => $this->begin_nom_2s,
            'end_nom_2s' => $this->end_nom_2s,
            'begin_app_1s' => $this->begin_app_1s,
            'end_app_1s' => $this->end_app_1s,
            'begin_app_2s' => $this->begin_app_2s,
            'end_app_2s' => $this->end_app_2s,
            'begin_mov_1s' => $this->begin_mov_1s,
            'end_mov_1s' => $this->end_mov_1s,
            'begin_mov_2s' => $this->begin_mov_2s,
            'end_mov_2s' => $this->end_mov_2s,
        ]);

        $query->andFilterWhere(['like', 'cod_area', $this->cod_area])
            ->andFilterWhere(['like', 'cod_uni', $this->cod_uni])
            ->andFilterWhere(['like', 'cod_pais', $this->cod_pais])
            ->andFilterWhere(['like', 'anotaciones', $this->anotaciones])
            ->andFilterWhere(['like', 'req_titulacion', $this->req_titulacion])
            ->andFilterWhere(['like', 'req_curso', $this->req_curso])
            ->andFilterWhere(['like', 'link_nom_online', $this->link_nom_online])
            ->andFilterWhere(['like', 'info_nom_online', $this->info_nom_online])
            ->andFilterWhere(['like', 'link_documentacion', $this->link_documentacion])
            ->andFilterWhere(['like', 'tipo_movilidad', $this->tipo_movilidad])
            ->andFilterWhere(['like', 'user_online', $this->user_online])
            ->andFilterWhere(['like', 'password_online', $this->password_online])
            ->andFilterWhere(['like', 'notas_online', $this->notas_online])
            ->andFilterWhere(['like', 'info_tor', $this->info_tor])
            ->andFilterWhere(['like', 'observ_discapacidad', $this->observ_discapacidad])
            ->andFilterWhere(['like', 'observ_req_ling', $this->observ_req_ling])
            ->andFilterWhere(['like', 'memo_grading', $this->memo_grading])
            ->andFilterWhere(['like', 'memo_visado', $this->memo_visado])
            ->andFilterWhere(['like', 'memo_seguro', $this->memo_seguro])
            ->andFilterWhere(['like', 'memo_alojamiento', $this->memo_alojamiento]);

        return $dataProvider;
    }
}
