<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasintalados */

$this->title = 'Update Sistemasintalados: ' . $model->idsistemasIntalados;
$this->params['breadcrumbs'][] = ['label' => 'Sistemasintalados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsistemasIntalados, 'url' => ['view', 'id' => $model->idsistemasIntalados]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sistemasintalados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
