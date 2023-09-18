<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemaseguridadelectronica */

$this->title = 'Update Sistemaseguridadelectronica: ' . $model->idsistemaSeguridadElectronica;
$this->params['breadcrumbs'][] = ['label' => 'Sistemaseguridadelectronicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsistemaSeguridadElectronica, 'url' => ['view', 'id' => $model->idsistemaSeguridadElectronica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sistemaseguridadelectronica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
