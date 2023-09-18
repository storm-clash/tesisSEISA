<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Organismo */

$this->title = 'Update Organismo: ' . $model->idorganismo;
$this->params['breadcrumbs'][] = ['label' => 'Organismos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idorganismo, 'url' => ['view', 'id' => $model->idorganismo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organismo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
