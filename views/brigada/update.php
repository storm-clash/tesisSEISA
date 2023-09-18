<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Brigada */

$this->title = 'Update Brigada: ' . $model->idbrigada;
$this->params['breadcrumbs'][] = ['label' => 'Brigadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idbrigada, 'url' => ['view', 'id' => $model->idbrigada]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brigada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
