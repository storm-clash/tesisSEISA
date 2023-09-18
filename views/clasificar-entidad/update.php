<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificarEntidad */

$this->title = 'Update Clasificar Entidad: ' . $model->idclasificarEntidad;
$this->params['breadcrumbs'][] = ['label' => 'Clasificar Entidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idclasificarEntidad, 'url' => ['view', 'id' => $model->idclasificarEntidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clasificar-entidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
