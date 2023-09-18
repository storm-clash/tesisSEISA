<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perimetralmalla */

$this->title = 'Update Perimetralmalla: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Perimetralmallas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perimetralmalla-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
