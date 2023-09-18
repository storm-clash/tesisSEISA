<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contrato;

/**
 * ContratoSearch represents the model behind the search form of `app\models\Contrato`.
 */
class ContratoSearch extends Contrato
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cliente_idcliente', 'dias', 'formasPago_id', 'estado'], 'integer'],
            [['monto'], 'number'],
            [['firma', 'contrato', 'motivo'], 'safe'],
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
        $query = Contrato::find();

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
            'monto' => $this->monto,
            'dias' => $this->dias,
            'formasPago_id' => $this->formasPago_id,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'firma', $this->firma])
            ->andFilterWhere(['like', 'contrato', $this->contrato])
            ->andFilterWhere(['like', 'motivo', $this->motivo]);

        return $dataProvider;
    }
}
