<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasproteccionrayos */

$this->title = $model->idsistemasProteccionRayos;
$this->params['breadcrumbs'][] = ['label' => 'Sistemasproteccionrayos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sistemasproteccionrayos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idsistemasProteccionRayos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idsistemasProteccionRayos], [
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
            'idsistemasProteccionRayos',
            'sistemasIntalados_idsistemasIntalados',
            'nivelesSepresores_id',
            'mastilPararayo_id',
            'pararrayos_id',
            'cantMediciones_id',
            'perimetralMalla_id',
            'tamanoBajante_id',
        ],
    ]) ?>

</div>
