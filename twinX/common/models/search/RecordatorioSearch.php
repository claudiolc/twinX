<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Recordatorio;

/**
 * RecordatorioSearch represents the model behind the search form of `common\models\Recordatorio`.
 */
class RecordatorioSearch extends Recordatorio
{
    public $nombreUsuarioAvisado;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_creador', 'id_usr_aviso', 'completado'], 'integer'],
            [['timestamp', 'deadline', 'titulo', 'descripcion'], 'safe'],
            ['nombreUsuarioAvisado', 'safe'],
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
    public function searchQuery($params)
    {
        $query = Recordatorio::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith('usrAviso');

        $dataProvider->sort->attributes['usrAviso'] = [
            'asc' => ['user.nombre' => SORT_ASC],
            'desc' => ['user.nombre' => SORT_DESC],
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
            'id_creador' => $this->id_creador,
            'id_usr_aviso' => $this->id_usr_aviso,
            'timestamp' => $this->timestamp,
            'deadline' => $this->deadline,
            'completado' => $this->completado,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'user.nombre', $this->nombreUsuarioAvisado]);

        return $query;
    }

    public function search($query)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $dataProvider;
    }
}
