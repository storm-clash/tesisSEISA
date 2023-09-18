<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Planificacion;

/**
 * PlanificacionSearch represents the model behind the search form of `app\models\Planificacion`.
 */
class PlanificacionSearch extends Planificacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idplanificacion', 'sistemasIntalados_idsistemasIntalados'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = Planificacion::find();

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
            'idplanificacion' => $this->idplanificacion,
            'fecha' => $this->fecha,
            'sistemasIntalados_idsistemasIntalados' => $this->sistemasIntalados_idsistemasIntalados,
        ]);

        return $dataProvider;
    }
}
