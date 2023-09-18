<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sistemasfijosextincion;

/**
 * SistemasfijosextincionSearch represents the model behind the search form of `app\models\Sistemasfijosextincion`.
 */
class SistemasfijosextincionSearch extends Sistemasfijosextincion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsistemasFijosExtincion', 'sistemasIntalados_idsistemasIntalados', 'obstruccionEquipo_id', 'cantidadAccesorios_id', 'cantidadSistemasFijos_id', 'alturaMontaje_id', 'complejidadSistFijos_id', 'condAmbSistFijos_id'], 'integer'],
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
        $query = Sistemasfijosextincion::find();

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
            'idsistemasFijosExtincion' => $this->idsistemasFijosExtincion,
            'sistemasIntalados_idsistemasIntalados' => $this->sistemasIntalados_idsistemasIntalados,
            'obstruccionEquipo_id' => $this->obstruccionEquipo_id,
            'cantidadAccesorios_id' => $this->cantidadAccesorios_id,
            'cantidadSistemasFijos_id' => $this->cantidadSistemasFijos_id,
            'alturaMontaje_id' => $this->alturaMontaje_id,
            'complejidadSistFijos_id' => $this->complejidadSistFijos_id,
            'condAmbSistFijos_id' => $this->condAmbSistFijos_id,
        ]);

        return $dataProvider;
    }
}
