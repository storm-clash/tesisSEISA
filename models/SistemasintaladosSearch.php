<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sistemasintalados;

/**
 * SistemasintaladosSearch represents the model behind the search form of `app\models\Sistemasintalados`.
 */
class SistemasintaladosSearch extends Sistemasintalados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsistemasIntalados', 'cliente_idcliente', 'tipoSistemaSeguridad_id', 'clasificarentidad_id'], 'integer'],
            [['local'], 'safe'],
            [['clasificacion'], 'number'],
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
        $query = Sistemasintalados::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'pagination'=>[
                'pageSize'=>10,
            ],
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
            'idsistemasIntalados' => $this->idsistemasIntalados,
            'cliente_idcliente' => $this->cliente_idcliente,
            'tipoSistemaSeguridad_id' => $this->tipoSistemaSeguridad_id,
            'clasificacion' => $this->clasificacion,
            'clasificarentidad_id' => $this->clasificarentidad_id,
        ]);

        $query->andFilterWhere(['like', 'local', $this->local]);

        return $dataProvider;
    }
}
