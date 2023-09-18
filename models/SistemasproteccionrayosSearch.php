<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sistemasproteccionrayos;

/**
 * SistemasproteccionrayosSearch represents the model behind the search form of `app\models\Sistemasproteccionrayos`.
 */
class SistemasproteccionrayosSearch extends Sistemasproteccionrayos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsistemasProteccionRayos', 'sistemasIntalados_idsistemasIntalados', 'nivelesSepresores_id', 'mastilPararayo_id', 'pararrayos_id', 'cantMediciones_id', 'perimetralMalla_id', 'tamanoBajante_id'], 'integer'],
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
        $query = Sistemasproteccionrayos::find();

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
            'idsistemasProteccionRayos' => $this->idsistemasProteccionRayos,
            'sistemasIntalados_idsistemasIntalados' => $this->sistemasIntalados_idsistemasIntalados,
            'nivelesSepresores_id' => $this->nivelesSepresores_id,
            'mastilPararayo_id' => $this->mastilPararayo_id,
            'pararrayos_id' => $this->pararrayos_id,
            'cantMediciones_id' => $this->cantMediciones_id,
            'perimetralMalla_id' => $this->perimetralMalla_id,
            'tamanoBajante_id' => $this->tamanoBajante_id,
        ]);

        return $dataProvider;
    }
}
