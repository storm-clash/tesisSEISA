<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cantidadsistemasfijos */

$this->title = 'Update Cantidadsistemasfijos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cantidadsistemasfijos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cantidadsistemasfijos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
