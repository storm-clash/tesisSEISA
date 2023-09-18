<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordencompra */

$this->title = 'Update Ordencompra: ' . $model->idordenCompra;
$this->params['breadcrumbs'][] = ['label' => 'Ordencompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idordenCompra, 'url' => ['view', 'id' => $model->idordenCompra]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordencompra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
