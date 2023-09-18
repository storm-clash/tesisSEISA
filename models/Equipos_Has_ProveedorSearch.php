<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipos_Has_Proveedor;

/**
 * Equipos_Has_ProveedorSearch represents the model behind the search form about `app\models\Equipos_Has_Proveedor`.
 */
class Equipos_Has_ProveedorSearch extends Equipos_Has_Proveedor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipos_idequipos', 'proveedor_idproveedor'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Equipos_Has_Proveedor::find();

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
            'equipos_idequipos' => $this->equipos_idequipos,
            'proveedor_idproveedor' => $this->proveedor_idproveedor,
        ]);

        return $dataProvider;
    }
}
