<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ofertacomercial;

/**
 * OfertacomercialSearch represents the model behind the search form of `app\models\Ofertacomercial`.
 */
class OfertacomercialSearch extends Ofertacomercial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cliente_idcliente', 'ueb_id', 'numeroDoc', 'elaborado'], 'integer'],
            [['fecha', 'fechaVencimiento', 'cargo'], 'safe'],
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
        $query = Ofertacomercial::find();

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
            'cliente_idcliente' => $this->cliente_idcliente,
            'ueb_id' => $this->ueb_id,
            'numeroDoc' => $this->numeroDoc,
            'fecha' => $this->fecha,
            'fechaVencimiento' => $this->fechaVencimiento,
            'elaborado' => $this->elaborado,
        ]);

        $query->andFilterWhere(['like', 'cargo', $this->cargo]);

        return $dataProvider;
    }
}
