<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tiposistemaseguridad */

//$this->title = 'Create Tipo Sistema de Seguridad';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Sistema de Seguridads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposistemaseguridad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
