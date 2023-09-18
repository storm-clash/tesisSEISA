<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Altura */

$this->title = 'Update Altura: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="altura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
