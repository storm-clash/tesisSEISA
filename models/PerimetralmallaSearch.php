<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perimetralmalla;

/**
 * PerimetralmallaSearch represents the model behind the search form of `app\models\Perimetralmalla`.
 */
class PerimetralmallaSearch extends Perimetralmalla
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'puntuacion', 'tamaño'], 'integer'],
            [['nombre', 'niveles'], 'safe'],
            [['ponderacion'], 'number'],
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
        $query = Perimetralmalla::find();

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
            'ponderacion' => $this->ponderacion,
            'puntuacion' => $this->puntuacion,
            'tamaño' => $this->tamaño,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'niveles', $this->niveles]);

        return $dataProvider;
    }
}
