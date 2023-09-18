<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Registromantenimientos;

/**
 * RegistromantenimientosSearch represents the model behind the search form of `app\models\Registromantenimientos`.
 */
class RegistromantenimientosSearch extends Registromantenimientos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idregistroMantenimientos', 'cliente_idcliente', 'brigada_idbrigada'], 'integer'],
            [['fecha', 'incidencias'], 'safe'],
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
        $query = Registromantenimientos::find();

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
            'idregistroMantenimientos' => $this->idregistroMantenimientos,
            'fecha' => $this->fecha,
            'cliente_idcliente' => $this->cliente_idcliente,
            'brigada_idbrigada' => $this->brigada_idbrigada,
        ]);

        $query->andFilterWhere(['like', 'incidencias', $this->incidencias]);

        return $dataProvider;
    }
}
