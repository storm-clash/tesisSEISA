<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos_Has_Proveedor */

$this->title = 'Update Equipos  Has  Proveedor: ' . $model->equipos_idequipos;
$this->params['breadcrumbs'][] = ['label' => 'Equipos  Has  Proveedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipos_idequipos, 'url' => ['view', 'equipos_idequipos' => $model->equipos_idequipos, 'proveedor_idproveedor' => $model->proveedor_idproveedor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipos--has--proveedor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
