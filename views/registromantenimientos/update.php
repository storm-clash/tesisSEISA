<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Registromantenimientos */

$this->title = 'Update Registromantenimientos: ' . $model->idregistroMantenimientos;
$this->params['breadcrumbs'][] = ['label' => 'Registromantenimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idregistroMantenimientos, 'url' => ['view', 'id' => $model->idregistroMantenimientos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registromantenimientos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
