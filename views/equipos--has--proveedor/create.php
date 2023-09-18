<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Equipos_Has_Proveedor */

$this->title = 'Create Equipos  Has  Proveedor';
$this->params['breadcrumbs'][] = ['label' => 'Equipos  Has  Proveedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos--has--proveedor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
