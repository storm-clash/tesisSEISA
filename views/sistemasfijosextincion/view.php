<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasfijosextincion */

$this->title = $model->idsistemasFijosExtincion;
$this->params['breadcrumbs'][] = ['label' => 'Sistemasfijosextincions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sistemasfijosextincion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idsistemasFijosExtincion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idsistemasFijosExtincion], [
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
            'idsistemasFijosExtincion',
            'sistemasIntalados_idsistemasIntalados',
            'obstruccionEquipo_id',
            'cantidadAccesorios_id',
            'cantidadSistemasFijos_id',
            'alturaMontaje_id',
            'complejidadSistFijos_id',
            'condAmbSistFijos_id',
        ],
    ]) ?>

</div>
