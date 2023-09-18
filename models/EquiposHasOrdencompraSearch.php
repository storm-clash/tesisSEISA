<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EquiposHasOrdencompra;

/**
 * EquiposHasOrdencompraSearch represents the model behind the search form of `app\models\EquiposHasOrdencompra`.
 */
class EquiposHasOrdencompraSearch extends EquiposHasOrdencompra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipos_idequipos', 'ordenCompra_idordenCompra'], 'integer'],
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
        $query = EquiposHasOrdencompra::find();

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
            'equipos_idequipos' => $this->equipos_idequipos,
            'ordenCompra_idordenCompra' => $this->ordenCompra_idordenCompra,
        ]);

        return $dataProvider;
    }
}
