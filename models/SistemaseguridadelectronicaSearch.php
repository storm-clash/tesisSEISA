<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sistemaseguridadelectronica;

/**
 * SistemaseguridadelectronicaSearch represents the model behind the search form of `app\models\Sistemaseguridadelectronica`.
 */
class SistemaseguridadelectronicaSearch extends Sistemaseguridadelectronica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsistemaSeguridadElectronica', 'sistemasIntalados_idsistemasIntalados', 'cantSistemas_id', 'cantDispositivos_id', 'compEquiposElec_id', 'altura_id', 'condambSegElect_id', 'obstruccionEquipo_id'], 'integer'],
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
        $query = Sistemaseguridadelectronica::find();

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
            'idsistemaSeguridadElectronica' => $this->idsistemaSeguridadElectronica,
            'sistemasIntalados_idsistemasIntalados' => $this->sistemasIntalados_idsistemasIntalados,
            'cantSistemas_id' => $this->cantSistemas_id,
            'cantDispositivos_id' => $this->cantDispositivos_id,
            'compEquiposElec_id' => $this->compEquiposElec_id,
            'altura_id' => $this->altura_id,
            'condambSegElect_id' => $this->condambSegElect_id,
            'obstruccionEquipo_id' => $this->obstruccionEquipo_id,
        ]);

        return $dataProvider;
    }
}
