<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planificacion */

//$this->title = 'Update Planificacion: ' . $model->idplanificacion;
$this->params['breadcrumbs'][] = ['label' => 'Planificacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idplanificacion, 'url' => ['view', 'id' => $model->idplanificacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planificacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
