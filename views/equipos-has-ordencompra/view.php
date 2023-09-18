<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EquiposHasOrdencompra */

$this->title = $model->equipos_idequipos;
$this->params['breadcrumbs'][] = ['label' => 'Equipos Has Ordencompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipos-has-ordencompra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'equipos_idequipos' => $model->equipos_idequipos, 'ordenCompra_idordenCompra' => $model->ordenCompra_idordenCompra], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'equipos_idequipos' => $model->equipos_idequipos, 'ordenCompra_idordenCompra' => $model->ordenCompra_idordenCompra], [
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
            'ordenCompra_idordenCompra',
        ],
    ]) ?>

</div>
