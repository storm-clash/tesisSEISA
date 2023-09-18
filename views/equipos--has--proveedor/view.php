<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos_Has_Proveedor */

$this->title = $model->equipos_idequipos;
$this->params['breadcrumbs'][] = ['label' => 'Equipos  Has  Proveedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos--has--proveedor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'equipos_idequipos' => $model->equipos_idequipos, 'proveedor_idproveedor' => $model->proveedor_idproveedor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'equipos_idequipos' => $model->equipos_idequipos, 'proveedor_idproveedor' => $model->proveedor_idproveedor], [
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
            'equipos_idequipos',
            'proveedor_idproveedor',
        ],
    ]) ?>

</div>
