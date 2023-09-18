<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EquiposHasOrdencompra */

$this->title = 'Update Equipos Has Ordencompra: ' . $model->equipos_idequipos;
$this->params['breadcrumbs'][] = ['label' => 'Equipos Has Ordencompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipos_idequipos, 'url' => ['view', 'equipos_idequipos' => $model->equipos_idequipos, 'ordenCompra_idordenCompra' => $model->ordenCompra_idordenCompra]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipos-has-ordencompra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
