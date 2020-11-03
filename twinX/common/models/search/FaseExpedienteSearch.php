<?php

namespace common\models\search;

use common\models\TipoExpediente;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FaseExpediente;

/**
 * FaseExpedienteSearch represents the model behind the search form of `common\models\FaseExpediente`.
 */
class FaseExpedienteSearch extends FaseExpediente
{
    public $tipoExp;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_tipo_exp'], 'integer'],
            [['descripcion'], 'safe'],
            ['tipoExp', 'safe'],
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
        $query = FaseExpediente::find();

        ///
        $query->joinWith('tipoExp');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        ///
        $dataProvider->sort->attributes['tipoExp'] = [
            'asc' => ['tipo_expediente.descripcion' => SORT_ASC],
            'desc' => ['tipo_expediente.descripcion' => SORT_DESC],
            'default' => SORT_DESC
        ];

//        $this->load($params);
//
//        if (!$this->validate()) {
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'fase_expediente.id' => $this->id,
            'id_tipo_exp' => $this->id_tipo_exp,
        ]);

        $query->andFilterWhere(['like', 'fase_expediente.descripcion', $this->descripcion]);
        ///
        $query->andFilterWhere(['like', 'tipo_expediente.descripcion', $this->tipoExp]);

        return $dataProvider;
    }
}
