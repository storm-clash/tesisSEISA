<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formaspago */

$this->title = 'Update Formaspago: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Formaspagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="formaspago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
