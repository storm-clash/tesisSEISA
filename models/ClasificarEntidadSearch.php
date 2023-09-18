<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clasificarentidad;

/**
 * ClasificarentidadSearch represents the model behind the search form of `app\models\Clasificarentidad`.
 */
class ClasificarentidadSearch extends Clasificarentidad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cantHombre', 'cantHoras', 'tipoParametro_id', 'tipoSistemaSeguridad_id'], 'integer'],
            [['rangoInicial', 'rangoFinal', 'precioMN', 'precioCUC'], 'number'],
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
        $query = Clasificarentidad::find();

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
            'rangoInicial' => $this->rangoInicial,
            'rangoFinal' => $this->rangoFinal,
            'precioMN' => $this->precioMN,
            'precioCUC' => $this->precioCUC,
            'cantHombre' => $this->cantHombre,
            'cantHoras' => $this->cantHoras,
            'tipoParametro_id' => $this->tipoParametro_id,
            'tipoSistemaSeguridad_id' => $this->tipoSistemaSeguridad_id,
        ]);

        return $dataProvider;
    }
}
