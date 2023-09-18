<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasproteccionrayos */

$this->title = 'Update Sistemasproteccionrayos: ' . $model->idsistemasProteccionRayos;
$this->params['breadcrumbs'][] = ['label' => 'Sistemasproteccionrayos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsistemasProteccionRayos, 'url' => ['view', 'id' => $model->idsistemasProteccionRayos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sistemasproteccionrayos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
