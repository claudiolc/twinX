<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Mensaje;

/**
 * MensajeSearch represents the model behind the search form of `common\models\Mensaje`.
 */
class MensajeSearch extends Mensaje
{
    public $nombreEmisor, $nombreReceptor;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_emisor', 'id_receptor', 'leido'], 'integer'],
            [['timestamp', 'etiqueta', 'asunto', 'cuerpo'], 'safe'],
            [['nombreEmisor', 'nombreReceptor'], 'safe'],
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
        $query = Mensaje::find();

        $query->joinWith(['emisor', 'receptor']);

        // add conditions that should always apply here


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nombreEmisor'] = [
            'asc' => ['user.nombre' => SORT_ASC],
            'desc' => ['user.nombre' => SORT_DESC],
            'default' => SORT_DESC
        ];

        $dataProvider->sort->attributes['nombreReceptor'] = [
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
            'timestamp' => $this->timestamp,
            'id_emisor' => $this->id_emisor,
            'id_receptor' => $this->id_receptor,
            'leido' => $this->leido,
        ]);

        $query->andFilterWhere(['like', 'etiqueta', $this->etiqueta])
            ->andFilterWhere(['like', 'asunto', $this->asunto])
            ->andFilterWhere(['like', 'cuerpo', $this->cuerpo])
            ->andFilterWhere(['like', 'user.nombre', $this->nombreEmisor])
            ->andFilterWhere(['like', 'user.nombre', $this->nombreReceptor]);

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
