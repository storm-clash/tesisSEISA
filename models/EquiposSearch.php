<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipos;

/**
 * EquiposSearch represents the model behind the search form of `app\models\Equipos`.
 */
class EquiposSearch extends Equipos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idequipos', 'sistemasIntalados_idsistemasIntalados', 'estado_id', 'cantidad'], 'integer'],
            [['nombreEquipo'], 'safe'],
            [['precioCosto', 'precioIntalacion', 'precioMantenimiento'], 'number'],
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
        $query = Equipos::find();

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
            'idequipos' => $this->idequipos,
            'precioCosto' => $this->precioCosto,
            'precioIntalacion' => $this->precioIntalacion,
            'precioMantenimiento' => $this->precioMantenimiento,
            'sistemasIntalados_idsistemasIntalados' => $this->sistemasIntalados_idsistemasIntalados,
            'estado_id' => $this->estado_id,
            'cantidad' => $this->cantidad,
        ]);

        $query->andFilterWhere(['like', 'nombreEquipo', $this->nombreEquipo]);

        return $dataProvider;
    }
}
