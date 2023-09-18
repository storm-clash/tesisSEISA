<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form of `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idusuario', 'rol_idrol'], 'integer'],
            [['nombreUsuario', 'primerApellido', 'segundoApellido', 'codigoSEISA', 'contrasena', 'user', 'auth_key', 'contrasena_reset_token', 'correo'], 'safe'],
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
        $query = Usuario::find();

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
            'idusuario' => $this->idusuario,
            'rol_idrol' => $this->rol_idrol,
        ]);

        $query->andFilterWhere(['like', 'nombreUsuario', $this->nombreUsuario])
            ->andFilterWhere(['like', 'primerApellido', $this->primerApellido])
            ->andFilterWhere(['like', 'segundoApellido', $this->segundoApellido])
            ->andFilterWhere(['like', 'codigoSEISA', $this->codigoSEISA])
            ->andFilterWhere(['like', 'contrasena', $this->contrasena])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'contrasena_reset_token', $this->contrasena_reset_token])
            ->andFilterWhere(['like', 'correo', $this->correo]);

        return $dataProvider;
    }
}
