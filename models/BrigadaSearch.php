<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Brigada;

/**
 * BrigadaSearch represents the model behind the search form of `app\models\Brigada`.
 */
class BrigadaSearch extends Brigada
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idbrigada', 'cantHombres', 'horasTrabajadas', 'horasPlanificadas', 'idJefeBrigada', 'categoria_id', 'ueb_id','estado'], 'integer'],
            [['nombre'], 'safe'],
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
        $query = Brigada::find();

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
            'idbrigada' => $this->idbrigada,
            'cantHombres' => $this->cantHombres,
            'horasTrabajadas' => $this->horasTrabajadas,
            'horasPlanificadas' => $this->horasPlanificadas,
            'idJefeBrigada' => $this->idJefeBrigada,
            'categoria_id' => $this->categoria_id,
            'ueb_id' => $this->ueb_id,
            'estado'=>$this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
