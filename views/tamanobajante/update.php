<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tamanobajante */

$this->title = 'Update Tamanobajante: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tamanobajantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tamanobajante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
