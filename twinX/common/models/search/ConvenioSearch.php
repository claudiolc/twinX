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
    public $codConvenio, $nombreCodUni, $areaCompleta;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_curso_creacion', 'creado_por', 'num_becas_in', 'num_becas_out', 'meses_in', 'meses_out', 'anno_inicio', 'anno_fin', 'nominacion_online', 'movilidad_pdi', 'movilidad_pas'], 'integer'],
            [['cod_area', 'cod_uni', 'cod_pais', 'req_titulacion', 'req_curso', 'link_nom_online', 'info_nom_online', 'link_documentacion', 'tipo_movilidad', 'user_online', 'password_online', 'fecha_online', 'info_tor', 'observ_discapacidad', 'observ_req_ling', 'begin_nom_1s', 'end_nom_1s', 'begin_nom_2s', 'end_nom_2s', 'begin_app_1s', 'end_app_1s', 'begin_app_2s', 'end_app_2s', 'begin_mov_1s', 'end_mov_1s', 'begin_mov_2s', 'end_mov_2s', 'memo_grading', 'memo_visado', 'memo_seguro', 'memo_alojamiento', 'nombre_coord', 'cargo_coord', 'email_coord', 'tlf_coord', 'address_coord', 'web_inf_acad', 'nombre_admon_in', 'cargo_admon_in', 'mail_admon_in', 'nombre_resp_acad_in', 'cargo_resp_acad_in', 'nombre_admon_out', 'cargo_admon_out', 'mail_admon_out', 'nombre_resp_acad_out', 'cargo_resp_acad_out', 'mail_resp_acad_out'], 'safe'],
            [['codConvenio', 'nombreCodUni', 'areaCompleta'], 'safe'],
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

        ///
        $query->joinWith(['codPais', 'codArea', 'codUni']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        ///
        $dataProvider->sort->attributes['codConvenio'] = [
            'asc' => ['pais.iso' => SORT_ASC],
            'desc' => ['pais.iso' => SORT_DESC],
            'default' => SORT_DESC
        ];

        $dataProvider->sort->attributes['nombreCodUni'] = [
            'asc' => ['universidad.nombre' => SORT_ASC],
            'desc' => ['universidad.nombre' => SORT_DESC],
            'default' => SORT_DESC
        ];

        $dataProvider->sort->attributes['areaCompleta'] = [
            'asc' => ['area.cod_isced' => SORT_ASC],
            'desc' => ['area.cod_isced' => SORT_DESC],
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
            ->andFilterWhere(['like', 'req_titulacion', $this->req_titulacion])
            ->andFilterWhere(['like', 'req_curso', $this->req_curso])
            ->andFilterWhere(['like', 'link_nom_online', $this->link_nom_online])
            ->andFilterWhere(['like', 'info_nom_online', $this->info_nom_online])
            ->andFilterWhere(['like', 'link_documentacion', $this->link_documentacion])
            ->andFilterWhere(['like', 'tipo_movilidad', $this->tipo_movilidad])
            ->andFilterWhere(['like', 'user_online', $this->user_online])
            ->andFilterWhere(['like', 'password_online', $this->password_online])
            ->andFilterWhere(['like', 'info_tor', $this->info_tor])
            ->andFilterWhere(['like', 'observ_discapacidad', $this->observ_discapacidad])
            ->andFilterWhere(['like', 'observ_req_ling', $this->observ_req_ling])
            ->andFilterWhere(['like', 'memo_grading', $this->memo_grading])
            ->andFilterWhere(['like', 'memo_visado', $this->memo_visado])
            ->andFilterWhere(['like', 'memo_seguro', $this->memo_seguro])
            ->andFilterWhere(['like', 'memo_alojamiento', $this->memo_alojamiento])
            ->andFilterWhere(['like', 'nombre_coord', $this->nombre_coord])
            ->andFilterWhere(['like', 'cargo_coord', $this->cargo_coord])
            ->andFilterWhere(['like', 'email_coord', $this->email_coord])
            ->andFilterWhere(['like', 'tlf_coord', $this->tlf_coord])
            ->andFilterWhere(['like', 'address_coord', $this->address_coord])
            ->andFilterWhere(['like', 'web_inf_acad', $this->web_inf_acad])
            ->andFilterWhere(['like', 'nombre_admon_in', $this->nombre_admon_in])
            ->andFilterWhere(['like', 'cargo_admon_in', $this->cargo_admon_in])
            ->andFilterWhere(['like', 'mail_admon_in', $this->mail_admon_in])
            ->andFilterWhere(['like', 'nombre_resp_acad_in', $this->nombre_resp_acad_in])
            ->andFilterWhere(['like', 'cargo_resp_acad_in', $this->cargo_resp_acad_in])
            ->andFilterWhere(['like', 'nombre_admon_out', $this->nombre_admon_out])
            ->andFilterWhere(['like', 'cargo_admon_out', $this->cargo_admon_out])
            ->andFilterWhere(['like', 'mail_admon_out', $this->mail_admon_out])
            ->andFilterWhere(['like', 'nombre_resp_acad_out', $this->nombre_resp_acad_out])
            ->andFilterWhere(['like', 'cargo_resp_acad_out', $this->cargo_resp_acad_out])
            ->andFilterWhere(['like', 'mail_resp_acad_out', $this->mail_resp_acad_out])
            ->andFilterWhere(['like', 'pais.iso', $this->codConvenio])
            ->orFilterWhere(['like', 'area.cod_isced', $this->codConvenio])
            ->orFilterWhere(['like', 'universidad.cod_uni', $this->codConvenio])
            ->andFilterWhere(['like', 'universidad.nombre', $this->nombreCodUni])
            ->orFilterWhere(['like', 'universidad.cod_uni', $this->nombreCodUni])
            ->andFilterWhere(['like', 'area.cod_isced', $this->areaCompleta])
            ->orFilterWhere(['like', 'area.nombre_isced', $this->areaCompleta])
            ->orFilterWhere(['like', 'area.nombre_area', $this->areaCompleta]);



        return $dataProvider;
    }
}
