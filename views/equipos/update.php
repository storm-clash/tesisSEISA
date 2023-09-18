<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */

$this->title = 'Update Equipos: ' . $model->idequipos;
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idequipos, 'url' => ['view', 'id' => $model->idequipos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
