<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Compequiposelec */

$this->title = 'Update Compequiposelec: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compequiposelecs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compequiposelec-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
