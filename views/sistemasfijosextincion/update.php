<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasfijosextincion */

$this->title = 'Update Sistemasfijosextincion: ' . $model->idsistemasFijosExtincion;
$this->params['breadcrumbs'][] = ['label' => 'Sistemasfijosextincions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsistemasFijosExtincion, 'url' => ['view', 'id' => $model->idsistemasFijosExtincion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sistemasfijosextincion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
