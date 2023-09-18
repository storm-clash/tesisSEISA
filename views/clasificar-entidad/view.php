<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificarEntidad */

$this->title = $model->idclasificarEntidad;
$this->params['breadcrumbs'][] = ['label' => 'Clasificar Entidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificar-entidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idclasificarEntidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idclasificarEntidad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idclasificarEntidad',
            'idJefeBrigada',
            'calificacion',
            'ubicacionInmueble',
            'alturaInmueble',
            'cliente_idcliente',
        ],
    ]) ?>

</div>
