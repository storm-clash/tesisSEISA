<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Responsables;

/**
 * ResponsablesSearch represents the model behind the search form of `app\models\Responsables`.
 */
class ResponsablesSearch extends Responsables
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'carnet', 'cliente_idcliente', 'cargos_id'], 'integer'],
            [['nombre', 'primerApe', 'segApellido'], 'safe'],
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
        $query = Responsables::find();

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
            'carnet' => $this->carnet,
            'cliente_idcliente' => $this->cliente_idcliente,
            'cargos_id' => $this->cargos_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'primerApe', $this->primerApe])
            ->andFilterWhere(['like', 'segApellido', $this->segApellido]);

        return $dataProvider;
    }
}
